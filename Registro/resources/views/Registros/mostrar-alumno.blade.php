@extends('layout/layout')
@section('title')
 Ver alumno
@endsection

<form>
    @csrf
    <div class="form-group"> <!-- Full Name -->
        <label class="control-label">Nombre</label>
        <input type="text" class="form-control" name="nombre" value="{{$alumno->nombre}}" readonly="">
    </div> 


    <div class="form-group"> <!-- State Button -->
        <label for="grado_id" class="control-label">Grado</label> 
        <input type="text" class="form-control" name="grado" value="{{$alumno->grado->nombre}}" readonly="">           
    </div>  
</form>

  
<table id="tabla" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th scope="col">N°</th>
                    <th scope="col">Materias</th>
                </tr>
            </thead>
            <tbody>
                @foreach($materias as $materia)
                <tr>
                    <td>{{$materia->nombre}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
<script src="{{ asset('js/avisos.js') }}"></script>
</body>