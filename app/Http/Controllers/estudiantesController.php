<?php

namespace App\Http\Controllers;

use App\Estudiante;
use Illuminate\Http\Request;

class estudiantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function MostrarEstudiante()
    {
      // listar 
      $estudiante = new  Estudiante();
      return view('Estudiante.List-estudiantes', compact('estudiante'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function List(Request $request)
    {
      $estudiantes = Estudiante::orderBy('codigo_auto_estudiante', 'ASC')->paginate(6);
      try
      {
        $query = Estudiante::query();
        if($request!=null)
        {
  
          if($request->codigo_estudiante!=null && $request->codigo_estudiante!="")
          {
            $query->where('codigo_estudiante', 'like', '%'.$request->codigo_estudiante.'%');
  
          }
  
          if($request->cedula_estudiante!=null && $request->cedula_estudiante!="")
          {
            $query->where('cedula_estudiante', 'like', '%'.$request->cedula_estudiante.'%');
          }
  
          $query->orderBy('codigo_auto_estudiante', 'ASC');
  
          $estudiantes = $query->paginate(6);
        }
        else
        {
            $estudiantes = Estudiante::orderBy('codigo_auto_estudiante', 'ASC')->paginate(6);
        }
  
      }
      catch (\Exception $e)
      {
        return redirect('Estudiante.List-estudiantes-layout')->with('msjerror', 'Ha sucedido un error al listar los Estudiantes'.$e->getMessage());
      }
  
      return view('Estudiante.List-estudiantes-layout', compact('estudiantes'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $student = new Estudiantes();
        return \View::make('estudiantes.new-estudiantes', compact('student'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try
        {
          $student = new Estudiantes();

          $student->codigo_auto_estudiante = $request->codigo_auto_estudiante;
          $student->codigo_estudiante = $request->codigo_estudiante;
          $student->nombre_estudiante = $request->nombre_estudiante;
          $student->cedula_estudiante = $request->cedula_estudiante;
          $student->correo_personal_estudiante = $request->correo_personal_estudiante;
          $student->correo_institucional_estudiante = $request->correo_institucional_estudiante;
          $student->contraseniaa_estudiante = $request->contraseniaa_estudiante;
         
          if ($student->save()) {
                
                $LogController->create('Se ha registrado un nuevo estudiante: '.$student->nombre_estudiante. 'con codigo: '.$student->codigo_estudiante, 2);
                return redirect('/estudiantes')->with('msj', 'Estudiante registrado correctamente.');
           }else{
            return redirect('/estudiantes')->with('msjerror', 'Ha sucedido un error al registrar al Estudiante.');
           }

        }
        catch (\Exception $e) {
          return redirect('/estudiantes')->with('msjerror', 'Ha sucedido un error al registrar al miembro.'.$e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\estudiantes  $estudiantes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try
        {
          $student = Estudiantes::find($id);
          if($student!=null)
          {
            return \View::make('estudiantes.Showestudiante', compact('student'));
          }
          else
          {
            return redirect('/estudiantes')->with('msjerror', 'Ha sucedido un error al tratar de consultar el asistente: '.$id);
          }
        }
        catch (\Exception $e) {
          return redirect('/estudiantes')->with('msjerror', 'Ha sucedido un error al tratar de consultar el asistente.'.$e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\estudiantes  $estudiantes
     * @return \Illuminate\Http\Response
     */
    public function edit(estudiantes $estudiantes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\estudiantes  $estudiantes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, estudiantes $estudiantes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\estudiantes  $estudiantes
     * @return \Illuminate\Http\Response
     */
    public function destroy(estudiantes $estudiantes)
    {
        //
    }
}
