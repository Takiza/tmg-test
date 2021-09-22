<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_animals', function (Blueprint $table) {
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreignId('animal_id');
            $table->foreign('animal_id')->references('id')->on('animals');
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
        Schema::table('user_animals', function (Blueprint $table) {
            $table->dropForeign('user_animals_user_id_foreign');
            $table->dropColumn('user_id');
            $table->dropForeign('user_animals_animal_id_foreign');
            $table->dropColumn('animal_id');
        });
        Schema::dropIfExists('user_animals');
    }
}
