<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeData extends Model
{
    use HasFactory;
   protected $table ="employes_data";
    public function employe(){
        return $this->belongsTo(Employe::class);
    }

}
