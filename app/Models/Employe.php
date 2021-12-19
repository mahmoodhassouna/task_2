<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $guarded=[];

    protected $table = "employes";

    public function employedata(){
        return $this->hasMany(EmployeData::class);
    }

    public function certificate(){
        return $this->hasMany(Certificate::class);
    }

    public function course(){
        return $this->hasMany(Course::class);
    }

    public function experience()
    {
        return $this->hasMany(Experience::class);
    }
}
