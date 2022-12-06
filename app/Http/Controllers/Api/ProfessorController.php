<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Professor;

class ProfessorController extends Controller
{
    public function createProfessor(Request $request)
    {

        $request->validate([ // Request de los valores necesarios para crear un Student nuevo
            'name' => 'required',
            'surname' => 'required',
            'dni' => 'required'
        ]);

        $prof = new Professor();
        $prof->name_prof = $request->name;
        $prof->surname_prof = $request->surname;
        $prof->dni_prof = $request->dni;

        $prof->save();

        return response()->json([
            "status" => 1,
            "msg" => "¡El profesor $prof->name se ha guardado correctamente!",
        ]);
    }

    public function destroyProfessor(Request $request)
    {

        $request->validate([
            'id' => 'required'
        ]);

        $data = Professor::find($request)->each->delete();

        if ($data) {
            $data = [
                "status" => "1",
                "msg" => "Se ha borrado el profesor"
            ];
        } else {
            $data = [
                "status" => "0",
                "msg" => "NO se ha borrado el profesor"
            ];
        }
        return response()->json($data);
    }

    public function updateProfessor(Request $request)
    {
        $request->validate(['id' => 'required', 'name' => 'required', 'surname' => 'required', 'dni' => 'required']);

        $id = $request->id;
        $name = $request->name;
        $surname = $request->surname;
        $dni = $request->dni;

        $data = Professor::find($id);

        if ($data) {
            $data->name = "$name";
            $data->surname = "$surname";
            $data->dni = "$dni";
            $data->save();
        }
        if ($data) {
            $data = [
                "status" => "1",
                "msg" => "Se ha actualizado el profesor $request->name"
            ];
        } else {
            $data = [
                "status" => "0",
                "msg" => "No se ha actualizado el profesor $request->name"
            ];
        }
        return response()->json($data);
    }

    public function readProfessor(Request $request)
    {
        $data = Professor::all();

        return response()->json($data);
    }
}
