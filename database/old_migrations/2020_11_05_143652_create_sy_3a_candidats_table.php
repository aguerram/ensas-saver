<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSy3aCandidatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sy_3a_candidats', function (Blueprint $table) {
            $table->string('3a_massar', 20);
            $table->string('3a_cin', 20)->primary();
            $table->string('3a_email', 100);
            $table->string('3a_mdp', 100);
            $table->string('3a_civilite', 5);
            $table->string('3a_nom', 100);
            $table->string('3a_prenom', 100);
            $table->string('3a_ddn', 20);
            $table->string('3a_ldn', 50);
            $table->string('3a_nationalite', 50);
            $table->string('3a_address', 300);
            $table->string('3a_ville', 50);
            $table->string('3a_tele', 15);
            $table->string('3a_fixe', 15)->nullable();
            $table->string('3a_type_bac', 50);
            $table->string('3a_annee_bac', 20);
            $table->float('3a_note_bac', 10, 0);
            $table->string('3a_mention_bac', 10);
            $table->string('3a_diplome', 10);
            $table->string('3a_diplome_prec', 10)->nullable();
            $table->string('3a_etablissement', 100);
            $table->string('3a_ville_etablissement', 50);
            $table->string('3a_annee_univ1', 20);
            $table->string('3a_redoublement1', 10);
            $table->float('3a_note_s1', 10, 0);
            $table->float('3a_note_s2', 10, 0);
            $table->string('3a_annee_univ2', 20);
            $table->string('3a_redoublement2', 10);
            $table->float('3a_note_s3', 10, 0)->nullable();
            $table->float('3a_note_s4', 10, 0)->nullable();
            $table->string('3a_annee_univ3', 20)->nullable();
            $table->string('3a_redoublement3', 10)->nullable();
            $table->float('3a_note_s5', 10, 0)->nullable();
            $table->float('3a_note_s6', 10, 0)->nullable();
            $table->string('3a_filiere', 10);
            $table->string('3a_picture', 200);
            $table->string('3a_matricule', 20);
            $table->string('3a_dossier', 20)->nullable();
            $table->string('3a_admission', 20)->nullable()->default('pending');
            $table->float('3a_note_preselection', 10, 0)->nullable()->default(0);
            $table->integer('3a_presence')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sy_3a_candidats');
    }
}
