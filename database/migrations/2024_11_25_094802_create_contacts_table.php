<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id(); // Automatyczny klucz główny
            $table->string('email'); // Kolumna dla emaila
            $table->string('topic'); // Kolumna dla tematu wiadomości
            $table->text('message'); // Kolumna dla treści wiadomości
            $table->timestamps(); // Automatyczne znaczniki czasu (created_at, updated_at)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
