<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_request', function (Blueprint $table) {
            $table->id();
            $table->integer('requesting_user');
            $table->foreignId('projeto_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->boolean('situacao')->default(0);
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
        Schema::dropIfExists('project_request');
    }
}
