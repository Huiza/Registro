<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Alumno;

class Sexo extends Model
{
    protected $fillable=['sexo'];

    public function getRouteKeyName()
    {
        return 'id';
    }
    public function alumnos()
    {
        return $this->hasMany(Alumno::class);
    }
    
}
