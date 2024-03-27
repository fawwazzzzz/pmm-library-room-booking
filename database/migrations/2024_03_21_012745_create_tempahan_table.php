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
            $table->string('namaPengguna');
            $table->string('email');
            $table->string('Jabatan');
            $table->date('date');
            $table->time('checkin');
            $table->time('checkout');
            $table->integer('groupNum');
            $table->string('purpose');
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
