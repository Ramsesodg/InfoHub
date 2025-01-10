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
            $table->foreignId('profil_id')->references('id')->on('profils');
            $table->string('nom_prenom_enquete'); // Nom et prénom de l'enquête
            $table->string('telephone_enquete'); // Téléphone de l'enquête
            $table->string('ville'); // Ville
            $table->decimal('longitude', 10, 7); // Longitude
            $table->decimal('latitude', 10, 7); // Latitude
            $table->string('nom_realisation'); // Nom de la réalisation
            $table->string('type_enquete'); // Type d'enquête
            $table->boolean('synchro')->default(false); // Synchronisation
            $table->boolean('validation')->default(false); // Validation
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
