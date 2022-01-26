@extends('layout/layout')
@section('title')
 Nuevo alumno
@endsection()

<form method="POST"  action="{{route('guardar_alumno')}}">
    @csrf
    <div class="form-group"> <!-- Full Name -->
        <label for="full_name_id" class="control-label">Nombre</label>
        <input type="text" class="form-control" name="nombre" placeholder="Ingrese el nombre por favor">
    </div>    

    <div class="form-group"> <!-- Street 1 -->
        <label for="" class="control-label">Fecha nacimiento</label>
        <input type="date" class="form-control" name="fecha_nacimiento">
    </div>                    
                                   
                            
    <div class="form-group"> <!-- State Button -->
        <label for="sexo_id" class="control-label">Sexo</label>
        <select class="form-control" name="sexo_id">
            <option value="">-Seleccione el sexo-</option>
            @foreach($sexos as $sexo)
            <option value="{{$sexo->id}}" {{ (old('sexo_id') == $loop->iteration ? "selected":"") }}>{{$sexo->sexo}}</option>
            @endforeach
        </select>                
    </div>

    <div class="form-group"> <!-- State Button -->
        <label for="grado_id" class="control-label">Grado</label>
        <select class="form-control" name="grado_id">
            <option value="">-Seleccione un grado-</option>
            @foreach($grados as $grado)
            <option value="{{$grado->id}}" {{ (old('grado_id') == $loop->iteration ? "selected":"") }}>{{$grado->nombre}}</option>
            @endforeach
        </select>                
    </div>
    
    <div class="form-group"> <!-- Zip Code-->
        <label for="" class="control-label">Observación</label>
        <input type="text" class="form-control"  name="observacion">
    </div>        
    
    <div class="form-group"> <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>     
    
</form>
</body>