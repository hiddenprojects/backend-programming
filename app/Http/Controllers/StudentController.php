<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller {
    //Index
    public function index($id = NULL) {

        if (($id != NULL ? !is_numeric($id) : $id)){
            $errormessage = ['message' => 'id yang dimasukan harus angka'];
            return response()->json($errormessage, 404);
        }

        $student = $id != NULL ? Student::where('id', $id)->get() : Student::all();

        return response()->json([
            'message' => 'Get all data students',
            'data' => $student
        ], 200);

    }

    public function store(Request $request) {
        $store_data = $request->validate([
            'nama' => 'required',
            'nim' => 'numeric|required',
            'email' => 'email|required',
            'jurusan' => 'required',
        ]);

        $student = Student::create($store_data);

        return response()->json([
            'message' => 'Student is created succesfully',
            'data' => $student
        ], 201);
    }

    public function update(Request $request, $id) {

        $get_current_data = Student::where('id', $id)->get();

        $store_data = [
            'nama' => $request->nama??$get_current_data[0]->nama,
            'nim' => $request->nim??$get_current_data[0]->nim,
            'email' => $request->email??$get_current_data[0]->email,
            'jurusan' => $request->jurusan??$get_current_data[0]->jurusan,
        ];

        Student::where('id', $id)
                ->update($store_data);

        return response()->json([
            'message' => "Update data sutdent success with id {$id}",
            'data' => Student::where('id', $id)->get()
        ], 200);
    }

    public function destroy($id) {
        Student::destroy($id);

        return response()->json([
            'message' => "Student with id {$id} has been deleted",
        ], 200);
    }
}
