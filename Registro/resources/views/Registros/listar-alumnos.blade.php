@extends('layout/layout')
@section('title')
Listado de alumnos
@endsection()

@section('content')
<body>
  
</table>
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

                            <a href="" class="btn btn-success btn-sm">
                        <i class="fas fa-edit">Ver</i>
                        </a>
                            <a href="#" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash-alt">Eliminar</i>
                        </a>
                        </div>
                    </td>
                </tr>
                @endforeach()
            </tbody>
        </table>
</body>
</html>