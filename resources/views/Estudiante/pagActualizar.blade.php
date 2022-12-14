@extends('PagPlantilla') 

@section('titulo')
    <h1 class="display-4">Página de lista </h1>
@endsection

@section('seccion')
    @if(session('msj'))
        <div class="alert alert-success">
            {{ session('msj') }}
        </div>
    @endif

    <form action="{{ route('Estudiante.xUpdate', $xActAlumnos->id) }}" method="post" class="d-grid gap-2">
        @method('PUT')
        @csrf

        @error('CodEst')
            <div class="alert alert-danger">
                El código es requerido
            </div>
        @enderror

        @error('NomEst')
            <div class="alert alert-danger">
                El nombre es requerido 
            </div>
        @enderror

        @if($errors -> has('ApeEst'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                El <strong>apellido</strong> es requerido 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <input type="text" name="CodEst" placeholder="Código" value="{{ $xActAlumnos->CodEst}}" class="form-control mb-1">
        <input type="text" name="NomEst" placeholder="Nombres" value="{{ $xActAlumnos->NomEst}}" class="form-control mb-1">
        <input type="text" name="ApeEst" placeholder="Apellidos" value="{{ $xActAlumnos->ApeEst}}" class="form-control mb-1">
        <input type="text" name="fnaEst" placeholder="Fecha de nacimiento" value="{{ $xActAlumnos->fnaEst}}" class="form-control mb-1">
        <select name="TurMat" class="form-control mb-1">
            <option value="">Seleccione...</option>
            <option value="1"  @if ($xActAlumnos->TurMat == 1)   {{"SELECTED"}} @endif>Turno Día(1)</option>
            <option value="2" @if ($xActAlumnos->TurMat == 2)   {{"SELECTED"}} @endif>Turno Noche</option>
            <option value="3" @if ($xActAlumnos->TurMat == 3)   {{"SELECTED"}} @endif>Turno Tarde</option>
        </select>
        <select name="SemMat" class="form-control mb-1">
            <option value="">Seleccione...</option>
            @for($i=1; $i < 7; $i++)
                <option value="{{$i}}" @if ($xActAlumnos->SemMat == $i)   {{"SELECTED"}} @endif>Semestre {{$i}}</option>
            @endfor
        </select>
        <select name="EstMat" class="form-control mb-1">
            <option value="">Seleccione...</option>
            <option value="0" @if ($xActAlumnos->EstMat == 1)   {{"SELECTED"}} @endif>Inactivo</option>
            <option value="1" @if ($xActAlumnos->EstMat == 0)   {{"SELECTED"}} @endif>Activo</option>
        </select>
        <button class="btn btn-success" type="submit">Actualizar</button>
    </form>

   
    
   

     
@endsection
   
