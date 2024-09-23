<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('nom');
            $table->string('serveurhote');
            $table->string('type');
            $table->string('categorie');
            $table->string('etat');
            $table->string('langage_dev');
            $table->date('date_ajout')->default(DB::raw('CURRENT_DATE'));
            $table->date('date_modif');
            $table->string('date_lancement');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
