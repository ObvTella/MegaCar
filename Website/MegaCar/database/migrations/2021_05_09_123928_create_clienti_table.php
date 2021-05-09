<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Clienti', function (Blueprint $table) 
		{
			$table->engine = 'InnoDB';
            $table->string('username', 45)->index();
			$table->string('password', 45);
			$table->string('nome_cliente', 45);
			$table->string('cognome_cliente', 45);
			$table->string('email_cliente', 45);
			$table->string('indirizzo_cliente', 45);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Clienti');
    }
}
