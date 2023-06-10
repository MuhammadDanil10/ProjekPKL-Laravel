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
        Schema::create('votings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('visi');
            $table->text('misi');
            $table->string('photo')->nullable();
            $table->integer('umur');
            $table->string('alamat');
            $table->text('hobi');
            $table->text('jabatan_lama');
            $table->text('motivasi');
            $table->integer('votes')->default(0);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votings');
    }
};
