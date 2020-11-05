<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSy4aCandidatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sy_4a_candidats', function (Blueprint $table) {
            $table->string('4a_cin', 20)->primary();
            $table->string('4a_massar', 20);
            $table->string('4a_email', 100);
            $table->string('4a_mdp', 100);
            $table->string('4a_civilite', 5);
            $table->string('4a_nom', 100);
            $table->string('4a_prenom', 100);
            $table->string('4a_ddn', 20);
            $table->string('4a_ldn', 50);
            $table->string('4a_nationalite', 50);
            $table->string('4a_address', 300);
            $table->string('4a_ville', 50);
            $table->string('4a_tele', 15);
            $table->string('4a_fixe', 15)->nullable();
            $table->string('4a_type_bac', 50);
            $table->string('4a_annee_bac', 20);
            $table->string('4a_mention_bac', 10);
            $table->float('4a_note_bac', 10, 0);
            $table->string('4a_diplome', 10);
            $table->string('4a_diplome_prec', 10)->nullable();
            $table->string('4a_etablissement', 100);
            $table->string('4a_ville_etablissement', 50);
            $table->string('4a_annee_univ1', 20)->nullable();
            $table->string('4a_annee_univ2', 20)->nullable();
            $table->string('4a_annee_univ3', 20)->nullable();
            $table->string('4a_annee_univ4', 20)->nullable();
            $table->string('4a_redoublement1', 10)->nullable();
            $table->string('4a_redoublement2', 10)->nullable();
            $table->string('4a_redoublement3', 10)->nullable();
            $table->string('4a_redoublement4', 10)->nullable();
            $table->float('4a_note_s1', 10, 0)->nullable();
            $table->float('4a_note_s2', 10, 0)->nullable();
            $table->float('4a_note_s3', 10, 0)->nullable();
            $table->float('4a_note_s4', 10, 0)->nullable();
            $table->float('4a_note_s5', 10, 0)->nullable();
            $table->float('4a_note_s6', 10, 0)->nullable();
            $table->float('4a_note_m1', 10, 0)->nullable();
            $table->float('4a_note_m2', 10, 0)->nullable();
            $table->string('4a_filiere', 10);
            $table->string('4a_picture', 200);
            $table->string('4a_matricule', 20);
            $table->string('4a_dossier', 20)->nullable();
            $table->string('4a_admission', 20)->nullable()->default('pending');
            $table->float('4a_note_preselection', 10, 0)->nullable()->default(0);
            $table->integer('4a_presence')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sy_4a_candidats');
    }
}
