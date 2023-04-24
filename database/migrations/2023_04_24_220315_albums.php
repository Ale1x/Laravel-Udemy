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
        Schema::create('Album', function (Blueprint $table) {
            $table->id();
            $table->string('album_name', 128);
            $table->string('album_thumb', 128);
            $table->text('description')->nullable(); // text a differenza di string non ha dimensione
            $table->foreignId('user_id'); // foreign key è un big integer unsigned non progressivo
            $table->foreign('user_id')
                ->on('users')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->softDeletes(); // crea la colonna "deleted_at"

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Album');
    }
};
