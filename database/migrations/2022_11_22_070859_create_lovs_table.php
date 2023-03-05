<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lovs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('remarks')->nullable();
            $table->integer('parent_id')->nullable();
            $table->foreignId('lov_category_id')->constrained('lov_categories', 'id')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('lovs');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
};
