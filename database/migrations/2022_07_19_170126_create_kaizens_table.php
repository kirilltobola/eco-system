<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kaizens', function (Blueprint $table) {
            $table->id();
            $table->boolean('published')->default(false);
            $table->bigInteger('reference_number')->unsigned()->nullable();
            $table->string('name');
            $table->text('description');
            $table->text('improvement')->nullable();
            $table->text('result')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('manager_id')->nullable();
            $table->unsignedBigInteger('bs_specialist_id')->nullable();
            $table->foreign('manager_id')->references('id')->on('users');
            $table->foreign('bs_specialist_id')->references('id')->on('users');

            $table->foreignId('theme_id')->nullable()->constrained();
            $table->foreignId('category_id')->nullable()->constrained();
            $table->foreignId('status_id')->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kaizens');
    }
};
