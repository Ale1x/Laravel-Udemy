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
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('name', 128);
            $table->text('description');
            $table->foreignId('album_id'); // foreign key è un big integer unsigned non progressivo
            $table->foreign('album_id')
                ->on('albums')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('img_path', 128);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photos', function (Blueprint $table) {
            //
        });
    }
};
