<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profils', function (Blueprint $table) {
            $table->id(); // Identifiant auto-incrémenté
            $table->string('nom');
            $table->string('prenom');
            $table->string('telephone');
            $table->string('email')->unique();
            $table->string('nom_utilisateur')->unique();
            $table->string('pass');
            $table->string('status')->default('actif'); // Défaut corrigé
            $table->enum('type', ['admin', 'utilisateur'])->default('utilisateur');
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
        Schema::dropIfExists('profils');
    }

}
