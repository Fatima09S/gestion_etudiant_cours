<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('cours_etudiant', function (Blueprint $table) {
        $table->id();
        $table->foreignId('etudiant_id')->constrained()->onDelete('cascade');
        $table->foreignId('cours_id')->constrained()->onDelete('cascade');
        $table->timestamps();
    });
}
};
