<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Throwable;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return Socialite::driver('google')
            ->with(['prompt' => 'select_account'])
            ->redirect();
    }

    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $email = $googleUser->getEmail();

            if (!$email) {
                return redirect('/login')->withErrors([
                    'email' => 'Google account has no email address.',
                ]);
            }

            $googleData = $googleUser->user;
            $verified = $googleData['email_verified'] ?? null;

            if ($verified !== null && !in_array($verified, [true, 1, '1', 'true'], true)) {
                return redirect('/login')->withErrors([
                    'email' => 'Please use a verified Google email.',
                ]);
            }

            $user = User::where('email', $email)->first();

            if (!$user) {
                $user = new User();

                $user->forceFill([
                    'name' => $googleUser->getName()
                        ?: $googleUser->getNickname()
                        ?: 'Google User',
                    'username' => Str::before($email, '@') . '-' . Str::lower(Str::random(5)),
                    'email' => $email,
                    'password' => Hash::make(Str::random(40)),
                    'role' => 'customer',
                ]);

                if (Schema::hasColumn('users', 'email_verified_at')) {
                    $user->email_verified_at = now();
                }

                $user->save();
            }

            Auth::login($user);
            request()->session()->regenerate();

            return redirect()->route('dashboard');

        } catch (Throwable $e) {
            report($e);

            return redirect('/login')->withErrors([
                'email' => 'Google login failed. Please check Laravel logs.',
            ]);
        }
    }
}
