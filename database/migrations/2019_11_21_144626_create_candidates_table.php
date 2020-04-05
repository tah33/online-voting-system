<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('election_id');
            $table->boolean('status')->default(0);
            $table->integer('votes')->default(0);
            $table->unsignedBigInteger('area_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('area_id')->references('id')->on('areas')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('election_id')->references('id')->on('elections')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidates');
    }
}
