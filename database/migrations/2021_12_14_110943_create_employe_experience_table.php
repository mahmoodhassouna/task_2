<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeExperienceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employe_experience', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employe_id')->nullable()->constrained('employes', 'id')->nullOnDelete();
            $table->foreignId('experience_id')->nullable()->constrained('experiences', 'id')->nullOnDelete();
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
        Schema::dropIfExists('employe_experience');
    }
}
