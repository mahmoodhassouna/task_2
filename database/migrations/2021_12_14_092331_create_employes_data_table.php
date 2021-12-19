<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployesDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes_data', function (Blueprint $table) {
            $table->id();
            $table->string('name',20);
            $table->string('relative_relation',20);
            $table->string('social_status',50)->nullable();
            $table->string('idNumber',9)->unique();
            $table->date('dateOfbirth',50);
            $table->string('is_study',30)->nullable();
            $table->string('is_work',30)->nullable();
            $table->text('attach_iD_photo')->nullable();
            $table->foreignId('employe_id')->constrained('employes', 'id')->cascadeOnDelete();
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
        Schema::dropIfExists('employes_data');
    }
}
