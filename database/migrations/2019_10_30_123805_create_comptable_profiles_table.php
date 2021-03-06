<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComptableProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comptable_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('comptable_id')->index() ;
            $table->string('nom');
            $table->string('prenom');
            $table->bigInteger('telephone');
            $table->text('about')->nullable();
            $table->string('image')->default('default.png');
            $table->foreign('comptable_id')
                ->references('id')->on('comptables')
                ->onDelete('cascade');
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
        Schema::dropIfExists('comptable_profiles');
    }
}
