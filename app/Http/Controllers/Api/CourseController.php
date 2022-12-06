<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function createCourse(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'prof' => 'required'
        ]);

        $course = new Course();
        $course->name = $request->name;
        $course->prof = $request->prof;

        $course->save();

        return response()->json([
            "status" => 1,
            "msg" => "¡El curso $course->name se ha guardado correctamente!",
        ]);
    }

    public function destroyCourse(Request $request)
    {

        $request->validate([
            'id' => 'required'
        ]);

        $data = Course::find($request)->each->delete();

        if ($data) {
            $data = [
                "status" => "1",
                "msg" => "Se ha borrado el curso"
            ];
        } else {
            $data = [
                "status" => "0",
                "msg" => "NO se ha borrado el curso"
            ];
        }
        return response()->json($data);
    }

    public function updateCourse(Request $request)
    {
        $request->validate(['id' => 'required', 'name' => 'required', 'prof' => 'required']);

        $id = $request->id;
        $name = $request->name;
        $prof = $request->prof;

        $data = Course::find($id);

        if ($data) {
            $data->name = "$name";
            $data->prof = "$prof";
            $data->save();
        }
        if ($data) {
            $data = [
                "status" => "1",
                "msg" => "Se ha actualizado el curso $request->name"
            ];
        } else {
            $data = [
                "status" => "0",
                "msg" => "No se ha actualizado el curso $request->name"
            ];
        }
        return response()->json($data);
    }

    public function readCourse(Request $request)
    {
        $data = Course::all();

        return response()->json($data);
    }
}
