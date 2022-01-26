<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sexo;
use App\Models\Grado;

class Alumno extends Model
{
     protected $fillable = ['nombre' ,'fecha_nacimiento', 'sexo_id', 'grado_id','observacion'];

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function sexo()
    {
        return $this->belongsTo(Sexo::class, 'sexo_id', 'id');
    }

    public function grado()
    {
        return $this->belongsTo(Grado::class, 'grado_id', 'id');
    }

}
