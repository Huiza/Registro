@extends('layout/layout')
@section('title')
Listado de alumnos
@endsection()

@section('content')
<body>
    <div class="btn-group">
        <a href="{{route('nuevo_alumno')}}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i>Nuevo</a>
    </div>


  
<table id="tabla" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th scope="col">N°</th>
                    <th scope="col">Aumno</th>
                    <th scope="col">Grado</th>
                    <th scope="col">Materias</th>
                    <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alumnos as $alumno)
                <tr>
                    <td>{{$alumno->id}}</td>
                    <td>{{$alumno->nombre}}</td>
                    <td>{{$alumno->grado->nombre}}</td>
                    <td>Matematicas</td>

                    <td>
                        <div class="btn-group">
                            <a href="{{route('editar_alumno', $alumno->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i>Editar</a>

                            <a href="{{route('ver_alumno',$alumno->id)}}" class="btn btn-success btn-sm">
                        <i class="fas fa-edit">Ver</i>
                        </a>
                        <form method="POST"  id="" action="{{route('eliminar_alumno', $alumno->id)}}" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onClick="{{$alumno->id}}"> Eliminar</button>
                        </form>
                        </div>
                    </td>
                </tr>
                @endforeach()
            </tbody>
        </table>
<script src="{{ asset('js/avisos.js') }}"></script>
</body>