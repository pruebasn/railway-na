<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;

class PagesController extends Controller
{
    ////PORTADA BIENVENIDA PARA EL PUBLICO GENERAL//////////////
    public function fnIndex() {
        return view('welcome');
    }

    //////LECTURA////////////
    public function fnLista() {
        $xAlumnos = Estudiante::all();    //datos de db
        return view('pagLista', compact('xAlumnos'));
    }
    public function fnEstActualizar($id){
        $xActAlumnos = Estudiante::findOrFail($id);
        return view('Estudiante.pagActualizar', compact('xActAlumnos'));
    }
    public function fnUpdate(Request $request,$id){ 

        $xUpdateAlumnos = Estudiante::findOrFail($id);

        $xUpdateAlumnos -> CodEst = $request -> CodEst;
        $xUpdateAlumnos -> NomEst = $request -> NomEst;
        $xUpdateAlumnos -> ApeEst = $request -> ApeEst;
        $xUpdateAlumnos -> fnaEst = $request -> fnaEst;
        $xUpdateAlumnos -> TurMat = $request -> TurMat;
        $xUpdateAlumnos -> SemMat = $request -> SemMat;
        $xUpdateAlumnos -> EstMat = $request -> EstMat;

        $xUpdateAlumnos -> save();

        return back()->with('msj','Se actualizo con exito...');
    }
    public function fnRegistrar(Request $request){

        //return $request;         //Prueba de "token" y datos recibidos

        $request ->validate([
            'CodEst' => 'required',
            'NomEst' => 'required',
            'ApeEst' => 'required',
            'fnaEst' => 'required',
            'TurMat' => 'required',
            'SemMat' => 'required',
            'EstMat' => 'required'
        ]);

        $nuevoEstudiante = new Estudiante;
        $nuevoEstudiante->CodEst = $request->CodEst;
        $nuevoEstudiante->NomEst = $request->NomEst;
        $nuevoEstudiante->ApeEst = $request->ApeEst;
        $nuevoEstudiante->fnaEst = $request->fnaEst;
        $nuevoEstudiante->TurMat = $request->TurMat;
        $nuevoEstudiante->SemMat = $request->SemMat;
        $nuevoEstudiante->EstMat = $request->EstMat;
        
        $nuevoEstudiante->save();
        
        //$xAlumnos = Estudiante::all();                      //Datos de BD
        //return view('pagLista', compact('xAlumnos'));        //Pasar a pagLista
        return back()->with('msj','Se registro con éxito...'); //Regresar con msj
    }

    public function fnEstDetalle($id){

        $xDetAlumnos = Estudiante::findOrFail($id);
        return view('Estudiante.PagDetalle', compact('xDetAlumnos'));
    }
    
    public function fnEliminar($id){
        $deleteAlumno = Estudiante::findOrFail($id);
        $deleteAlumno->delete();
        return back()->with('msj','Seelimino con exito....');
     }
    
    public function fnGaleria ($numero=69) {
        //return "FOTO DE CODIGO: ".$numero ;
        return view('pagGaleria', ['valor'=>$numero, 'otro'=>132]);
    }
    


}