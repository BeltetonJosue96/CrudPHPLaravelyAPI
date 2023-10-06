<?php

namespace App\Http\Controllers;

use App\Models\Alumnos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()

    {
        $datos['alumnos']=Alumnos::paginate(10);
        return view('Alumnos.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('Alumnos.createAlumnos');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $campos=[
            'Nombres'=>'required|string|max:100',
            'PrimerApellido'=>'required|string|max:100',
            'SegundoApellido'=>'required|string|max:100',
            'CorreoElectronico'=>'required|string|max:100',
            'Celular'=>'required|string|max:100',
            'Direccion'=>'required|string|max:100',
            'Foto' => 'required'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];
        $this->validate($request, $campos,$mensaje);
        $datosAlumno = $request->except('_token','base64');
        $base64_image = $request->base64;
        $datosAlumno['Foto'] = $base64_image;
        Alumnos::insert($datosAlumno);
        return redirect('Alumnos')->with('mensaje', 'Alumno Agregado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */

    public function show(Alumnos $alumnos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {/*Lo que hacemos es rellenar el formulario con los datos*/

        $alumnos=Alumnos::findOrFail($id);

       return view('Alumnos.edit',compact('alumnos'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request,  $id)
    {
        $campos=[
            'Nombres'=>'required|string|max:100',
            'PrimerApellido'=>'required|string|max:100',
            'SegundoApellido'=>'required|string|max:100',
            'CorreoElectronico'=>'required|string|max:100',
            'Celular'=>'required|string|max:100',
            'Direccion'=>'required|string|max:100',
            'Foto' => 'required'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];
        $this->validate($request, $campos,$mensaje);
        $datosAlumno = $request->except('_token','_method','base64');
        $base64_image = $request->base64;
        $datosAlumno['Foto'] = $base64_image;
        Alumnos::where('id','=',$id)->update($datosAlumno);
        $alumnos=Alumnos::findOrFail($id);
        return redirect('Alumnos')->with('mensaje', 'Alumno Modificado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Alumnos::destroy($id);

        #Retornamos a la pagina
        return redirect('Alumnos')->with('mensaje', 'Alumno Eliminado Correctamente');
    }
}
