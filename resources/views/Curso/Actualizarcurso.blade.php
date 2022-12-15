@extends('PagPlantilla') 

@section('titulo')
    <h1 class="display-4">Página de cursos </h1>
@endsection

@section('seccion')
    @if(session('msj'))
        <div class="alert alert-success">
            {{ session('msj') }}
        </div>
    @endif

    <form action="{{ route('Curso.xUpdate', $xActCurso
        ->id) }}" method="post" class="d-grid gap-2">
        @method('PUT')
        @csrf

        @error('denCur')
            <div class="alert alert-danger">
                La denominacion es requerida
            </div>
        @enderror

        @error('hrsCur')
            <div class="alert alert-danger">
                Las horas del curso es requerida
            </div>
        @enderror

        @error('creCur')
            <div class="alert alert-danger">
                El credito es requerido
            </div>
        @enderror

        @error('plaCur')
            <div class="alert alert-danger">
                El año es requerido 
            </div>
        @enderror
        
        @error('tipCur')
            <div class="alert alert-danger">
                El dato es requerido 
            </div>
        @enderror

        @error('estCur')
            <div class="alert alert-danger">
                El estado es requerido 
            </div>
        @enderror
        

        <input type="text" name="denCur" placeholder="Denominación" value="{{ $xActCurso->denCur}}" class="form-control mb-1">
        <input type="text" name="hrsCur" placeholder="Horas" value="{{ $xActCurso->hrsCur}}" class="form-control mb-1">
        <input type="text" name="creCur" placeholder="Creditos" value="{{ $xActCurso->creCur}}" class="form-control mb-1">
        <input type="text" name="plaCur" placeholder="Año" value="{{ $xActCurso->plaCur}}" class="form-control mb-1">
        <select name="tipCur" class="form-control mb-1">
            <option value="">Seleccione...</option>
            <option value="1" @if ($xActCurso->tipCur == 1)   {{"SELECTED"}} @endif>Transversal</option>
            <option value="2" @if ($xActCurso->tipCur == 2)   {{"SELECTED"}} @endif>Especialidad</option>
        </select>
        <select name="estCur" class="form-control mb-1">
            <option value="">Seleccione...</option>
            <option value="0" @if ($xActCurso->estCur == 1)   {{"SELECTED"}} @endif>Inactivo</option>
            <option value="1" @if ($xActCurso->estCur == 0)   {{"SELECTED"}} @endif>Activo</option>
        </select>
        <button class="btn btn-success" type="submit">Actualizar</button>
    </form>  
@endsection