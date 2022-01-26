<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Sexo;
use App\Models\Grado;
use App\Models\Materia;
use Carbon\Carbon;
use App\Http\Requests\RegistroRequest;
use App\Http\Requests\EditarAlumnoRequest;
use App\Http\Requests\BusquedaRequest;
use DB;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $alumnos = Alumno::all();
        return view('Registros.listar-alumnos', compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $sexos = Sexo::all();
        $grados = Grado::all();
        return view('Registros.crear-alumno',compact('sexos','grados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegistroRequest $request)
    {
        //
        $alumno = new Alumno();
        $alumno->nombre = $request->nombre;
        $alumno->fecha_nacimiento = $request->fecha_nacimiento;
        $edad = $this->calcular_edad($alumno->fecha_nacimiento);
        $alumno->sexo_id =  $request->sexo_id;
        $alumno->grado_id = $request->grado_id;
        $alumno->observacion = $request->observacion;
        $alumno->save();
        return redirect()->route('listado_alumnos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
       $alumno = Alumno::findOrFail($id);
       $materias = DB::table('materia_grados')
            ->join('materias', 'materia_grados.materia_id', '=', 'materias.id')
            ->join('grados','materia_grados.grado_id','=',"grados.id")
            ->select('materias.nombre')
            ->where("grados.id","=",$alumno->grado_id)
            ->get();
           return view('Registros.mostrar-alumno',compact('alumno','materias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
       $alumno = Alumno::findOrFail($id);
       $sexos = Sexo::all();
       $grados = Grado::all();
       return view('Registros.editar-alumno', compact('alumno', 'sexos','grados')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditarAlumnoRequest $request, $id)
    {
        //
       $alumno = Alumno::FindOrFail($id);
       $alumno->nombre = $request->nombre;
       $alumno->fecha_nacimiento = $request->fecha_nacimiento;
       $alumno->sexo_id =  $request->sexo_id;
       $alumno->grado_id = $request->grado_id;
       $alumno->observacion = $request->observacion;
       $alumno->save();
       return redirect()->route('listado_alumnos');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $aviso = Alumno::findOrFail($id);
        $aviso->delete();

        return back()->with('message',['success','Alumno eliminado correctamente']);
    }

     public function calcular_edad($fecha_nacimiento){
        /*Calculo de la edad*/
        $now             = Carbon::now();
        $fecha_actual    = $now->format('d-m-Y'); //Calcula la fecha actual
        $diferencia_edad = strtotime($fecha_actual) - strtotime($fecha_nacimiento); //Resta la fecha actual con la fecha de nacimiento
        $edad            = intval($diferencia_edad / 60 / 60 / 24 / 365.25); 
        /*Se obtiene el resultado en la mas minima expresión en entero donde los valores divididos representan segundos,minutos,horas,días
        y el 365.25 es por que cada 4 años hay un año bisisesto si no se coloca  la fracción entonces la edad sería en decimales
         */
        return $edad;
    }

}
