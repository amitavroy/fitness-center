<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->integer('age');
            $table->string('interested_package')->nullable();
            $table->date('dob');
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('added_by');
            $table->boolean('active')->default(1);
            $table->timestamps();

            $table->index(['phone', 'branch_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leads');
    }
}
