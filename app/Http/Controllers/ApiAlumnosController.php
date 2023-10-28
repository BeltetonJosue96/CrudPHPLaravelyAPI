<?php

namespace App\Http\Controllers;

use App\Models\Alumnos;
use Illuminate\Http\Request;

class ApiAlumnosController extends Controller
{
    public function index(Request $request)
    {
        return "API de Aplicación de Alumnos";
    }

    public function create(Request $request)
    {
        $request->validate([
            'Nombres'=>'required|string|max:100',
            'PrimerApellido'=>'required|string|max:100',
            'SegundoApellido'=>'required|string|max:100',
            'CorreoElectronico'=>'required|string|max:100',
            'Celular'=>'required|string|max:100',
            'Direccion'=>'required|string|max:100',
            'Foto' => 'required'
        ]);
        Alumnos::create([
            'Nombres'=> $request->Nombres,
            'PrimerApellido'=> $request->PrimerApellido,
            'SegundoApellido'=> $request->SegundoApellido,
            'CorreoElectronico'=> $request->CorreoElectronico,
            'Celular'=> $request->Celular,
            'Direccion'=> $request->Direccion,
            'Foto' => $request->Foto,
        ]);
        return response()->json(['mensaje' => 'El alumno(a) fue agregada exitosamente']);
    }

    public function all(Request $request)
    {
        $tasks = Alumnos::all();
        $alumnos = $tasks->values();
        return response()->json($alumnos);
    }

    public function getAlumno(Request $request, int $id)
    {
        $task = Alumnos::find($id);
        if (is_null($task)) {
            return response()->json('Datos no encontrados', 404);
        }
        return response()->json($task);
    }

    public function edit(Request $request, int $id)
    {
        $task = Alumnos::find($id);
        if (is_null($task)) {
            return response()->json('Datos no encontrados', 404);
        }
        $validate = $request->validate([
            'Nombres'=>'required|string|max:100',
            'PrimerApellido'=>'required|string|max:100',
            'SegundoApellido'=>'required|string|max:100',
            'CorreoElectronico'=>'required|string|max:100',
            'Celular'=>'required|string|max:100',
            'Direccion'=>'required|string|max:100',
            'Foto' => 'required'
        ]);
        $task->Nombres = $request->Nombres;
        $task->PrimerApellido = $request->PrimerApellido;
        $task->SegundoApellido = $request->SegundoApellido;
        $task->CorreoElectronico = $request->CorreoElectronico;
        $task->Celular = $request->Celular;
        $task->Direccion = $request->Direccion;
        $task->Foto = $request->Foto;
        $task->save();
        return response()->json(['Alumno(a) modificada exitosamente.']);
    }

    public function delete(Request $request, $id)
    {
        $task = Alumnos::find($id);
        if (is_null($task)) {
            return response()->json('Datos no encontrados', 404);
        }
        $task->delete();
        return response()->json(['Alumno(a) eliminada correctamente.']);
    }
}
