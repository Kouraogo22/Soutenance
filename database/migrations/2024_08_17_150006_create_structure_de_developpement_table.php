<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('structure_de_developpements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->constrained('applications');
            $table->string('type');
            $table->string('responsable');
            $table->string('email_respons');
            $table->string('contact_respons');
            $table->string('budget');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('structure_de_developpement');
    }
};
