<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaisseUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caisse_users', function (Blueprint $table) {
            $table->id();
            $table->time('heure_debut');
            $table->time('heure_fin');
            $table->datetime('date');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('caisse_id');
            $table->timestamps();
            $table->foreign('user_id') 
                ->references('id') 
                ->on('users') 
                ->onDelete('cascade') 
                ->onUpdate('cascade');
           $table->foreign('caisse_id') 
                ->references('id') 
                ->on('caisses') 
                ->onDelete('cascade') 
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caisse_users');
    }
}
