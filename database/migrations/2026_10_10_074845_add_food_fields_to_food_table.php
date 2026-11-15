
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('food', function (Blueprint $table) {
            $table->string('name')->after('id');
            $table->decimal('price', 10, 2)->default(0)->after('name');
            $table->enum('availability', ['available', 'unavailable'])
                  ->default('available')
                  ->after('price');
        });
    }

    public function down(): void
    {
        Schema::table('food', function (Blueprint $table) {
            $table->dropColumn([
                'name',
                'price',
                'availability',
            ]);
        });
    }
};
