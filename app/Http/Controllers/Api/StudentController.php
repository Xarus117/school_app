<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function createStudent(Request $request)
    {

        $request->validate([ // Request de los valores necesarios para crear un Student nuevo
            'name' => 'required',
            'surname' => 'required',
            'dni' => 'required',
            'course' => 'required',
        ]);

        $student = new Student();
        $student->name_student = $request->name;
        $student->surname_student = $request->surname;
        $student->dni_student = $request->dni;
        $student->course_student = $request->course;

        $student->save();

        return response()->json([
            "status" => 1,
            "msg" => "¡El student $student->name_student se ha guardado correctamente!",
        ]);
    }

    public function destroyStudent(Request $request)
    {

        $request->validate([
            'id' => 'required'
        ]);

        $data = Student::find($request)->each->delete();

        if ($data) {
            $data = [
                "status" => "1",
                "msg" => "Se ha borrado el estudiante"
            ];
        } else {
            $data = [
                "status" => "0",
                "msg" => "NO se ha borrado el estudiante"
            ];
        }
        return response()->json($data);
    }

    public function updateStudent(Request $request)
    {
        $request->validate(['id' => 'required', 'name' => 'required', 'surname' => 'required', 'dni' => 'required', 'course' => 'required']);

        $id = $request->id;
        $name = $request->name;
        $surname = $request->surname;
        $dni = $request->dni;
        $course = $request->course;

        $data = Student::find($id);

        if ($data) {
            $data->name = "$name";
            $data->surname = "$surname";
            $data->dni = "$dni";
            $data->course = "$course";
            $data->save();
        }
        if ($data) {
            $data = [
                "status" => "1",
                "msg" => "Se ha actualizado el student $request->name"
            ];
        } else {
            $data = [
                "status" => "0",
                "msg" => "No se ha actualizado el student $request->name"
            ];
        }
        return response()->json($data);
    }

    public function readStudent(Request $request)
    {
        $data = Student::all();

        return response()->json($data);
    }
}
