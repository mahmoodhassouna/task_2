<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar',50);
            $table->string('name_en',50)->nullable();
            $table->string('job_number',8)->unique();
            $table->string('id_number',9)->unique();
            $table->enum('gender',['انثى','ذكر']);
            $table->string('phone',10);
            $table->string('specialization',70);
            $table->string('telli_phone',9);
            $table->string('email',100);
            $table->string('address',150)->nullable();
            $table->date('date_of_employment',60);
            $table->date('date_of_birth',60);
            $table->string('relative_relation',50);
            $table->text('photo');
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
        Schema::dropIfExists('employes');
    }
}
