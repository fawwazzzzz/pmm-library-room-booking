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
        Schema::create('tempahan', function (Blueprint $table) {
            $table->id();
            $table->string('namaPengguna')->nullable();
            $table->string('noMatriks')->nullable();
            $table->string('email')->nullable();
            $table->string('IC')->nullable();
            $table->string('noPhone')->nullable();

            $table->integer('semester')->nullable();
            $table->date('date')->nullable();
            $table->time('checkin')->nullable();
            $table->time('checkout')->nullable();


            $table->foreignId('idJabatan')->nullable()->constrained('jabatan', 'idJabatan')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('idProgram')->nullable()->constrained('program', 'idProgram')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->integer('groupNum')->nullable();
            $table->string('purpose')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();

            $table->foreignId('roomID')->constrained('room', 'roomID')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tempahan');
    }
};
