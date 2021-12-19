<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('work_place',70);
            $table->string('job_title',70);
            $table->date('start_date',50);
            $table->date('expiry_date',50);
            $table->integer('salary')->length(10);
            $table->string('details_experience',255)->nullable();
            $table->string('currency',15)->nullable();
            $table->foreignId('employe_id')->nullable()->constrained('employes', 'id')->cascadeOnDelete();

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
        Schema::dropIfExists('experiences');
    }
}
