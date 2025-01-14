<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiches', function (Blueprint $table) {
            $table->id();
            $table->string('nom_enquete');
            $table->string('prenom_enquete');
            $table->string('telephone_enquete');
            $table->enum('ville',['ouagadougou','kaya','dori']);
            $table->decimal('longitude', 10, 7);
            $table->decimal('latitude', 10, 7);
            $table->string('nom_realisation');
            $table->enum('type_enquete', ['forage', 'saponification']);
            $table->integer('validation')->default(0); // Statut de validation (0 = Initié)
            $table->integer('synchro')->default(0); // Défaut corrigé
            $table->unsignedBigInteger('profil_id');
            $table->foreign('profil_id')->references('id')->on('profils')->onDelete('cascade');
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
        Schema::dropIfExists('fiches');
    }

}
