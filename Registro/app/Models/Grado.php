<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Grado;

class Grado extends Model
{
	protected $fillable=['nombre'];

    public function getRouteKeyName()
    {
        return 'id';
    }
    
    public function alumnos()
    {
        return $this->hasMany(Alumno::class);
    } 
}
