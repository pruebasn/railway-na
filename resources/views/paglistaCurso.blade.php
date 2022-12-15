@extends('PagPlantilla') 

@section('titulo')
    <h1 class="display-4">Página de lista de Curso</h1>
@endsection

@section('seccion')
    @if(session('msj'))
        <div class="alert alert-success">
            {{ session('msj') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
        </div>
    @endif

    <form action="{{ route('Curso.xRegistrar') }}" method="post" class="d-grid gap-2">
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

        <input type="text" name="denCur" placeholder="Denominacion" value="{{ old('denCur')}}" class="form-control mb-1">
        <input type="text" name="hrsCur" placeholder="Horas" value="{{ old('hrsCur')}}" class="form-control mb-1">
        <input type="text" name="creCur" placeholder="Creditos" value="{{ old('creCur')}}" class="form-control mb-1">
        <input type="text" name="plaCur" placeholder="Año" value="{{ old('plaCur')}}" class="form-control mb-1">
        <select name="tipCur" class="form-control mb-1">
            <option value="">Seleccione...</option>
            <option value="1">Transversal</option>
            <option value="2">Especialidad</option>
        </select>
        <select name="estCur" class="form-control mb-1">
            <option value="">Seleccione...</option>
            <option value="0">Inactivo</option>
            <option value="1">Activo</option>
        </select>
        <button class="btn btn-success" type="submit">Agregar</button>
    </form>
    <div class="btn btn-dark d-grid fs-5 mb-2 bt-2">Lista de seguimiento...</div>  
    <table class="table">
        <thead class="table-secondary">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Denominacion del curso</th>
                <th scope="col">Creditos</th>
                <th scope="col">Horas</th>
                <th scope="col">Editar</th>
            </tr>
        </thead>
        <tbody>

            @foreach($xCurso as $item)
            <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>{{ $item->denCur }}</td>
                <td>
                    <a href="{{ route('Curso.xDetalle', $item->id) }}">
                        {{ $item->creCur }}
                    </a>
                   

                </td>
                <td>
                    <a href="{{ route('Curso.xDetalle', $item->id) }}">
                        {{ $item->hrsCur }}
                    </a>
                   

                </td>
                <td>
                    <form action="{{ route('Curso.xEliminar', $item->id) }}" method="post" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">
                            x
                        </button>
                    </form>
                    ...
                    <a class="btn btn-warning btn-sm" href="{{ route('Curso.xActualizar', $item->id) }}">
                    A
                    </a>
                </td>
            </tr>
            @endforeach

        </tbody>
        <thead class="table-secondary">
            <tr>
                <th colspan="4">.</th>
            </tr>
        </thead>
    </table>

    {{ $xCurso->links() }}
@endsection
   
