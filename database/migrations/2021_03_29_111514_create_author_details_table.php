<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('author_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id');//gli metto singolare della tabella principale
            $table->text('bio');
            $table->string('pic',2048);
            $table->string('website',2048);
            //la definisco alla fine
            $table->timestamps();
            $table->foreign('author_id')
            ->references('id')
            ->on('authors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('author_details');
    }
}
