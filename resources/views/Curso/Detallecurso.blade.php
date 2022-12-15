@extends ('PagPlantilla')

@section('Titulo')
    <h1 class="display-4">PAGINA DE LISTA </h1>
@endsection

@section('seccion')
    <h3>Detalle de Cursos</h3>
    <p>ID:                   {{ $xDetCurso->id}}</p>
    <p>DENOMINACION:               {{ $xDetCurso->denCur}}</p>
    <p>HORAS :  {{ $xDetCurso->hrsCur}}</p>
    <p>CREDITOS :  {{ $xDetCurso->creCur}}</p>
    <p>AÑO :                {{ $xDetCurso->plaCur}}</p>
    <p>TIPO :             {{ $xDetCurso->tipCur}}</p>
    <p>ESTADO :  {{ $xDetCurso->estCur}}</p>
@endsection
    