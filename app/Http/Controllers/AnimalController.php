<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller {

    private $animals = [
        'dog',
        'cat',
        'bird',
        'fish',
        'lizard',
    ];

    public function index() {

        return response()
        ->json([
            "message" => "Menampilkan data animals",
            "data" => $this->animals
        ]);

    }

    public function store(Request $request) {

        array_push($this->animals, $request->nama);

        return response()
        ->json([
            "message" => "Menampilkan data animals",
            "data" => $this->animals
        ]);
    }

    public function update(Request $request, $id) {

        $this->animals[$id] = $request->nama;

        return response()
        ->json([
            "message" => "Data hewan dengan id {$id} berhasil diubah",
            "data" => $this->animals
        ]);
    }

    public function destroy($id) {

        unset($this->animals[$id]);

        return response()
        ->json([
            "message" => "Data hewan dengan id {$id} berhasil dihapus",
            "data" => $this->animals
        ]);

    }
}
