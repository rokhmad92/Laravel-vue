<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{
    public function index() {
        $get = User::all();
        return response()->json($get);
    }

    public function show(User $user) {
        $get = User::where('id', $user->id)->get();
        return response()->json($get);
    }

    public function store(Request $request) {
        $validateData = validator::make($request->input(), [
            'name' => 'required|min:4',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ], [
            'name.required' => 'Kolom Name tidak boleh kosong!',
            'password.min' => 'Password minimal 8 karakter'
        ]);

        if($validateData->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => $validateData->errors()
            ]);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return response()->json([
            'status' => 200,
            'messages' => 'Berhasil Menambahkan data'
        ]);;
    }

    public function destroy(User $user) {
        User::destroy($user->id);
        return response()->json([
            'status' => 200
        ]);
    }

    public function update(User $user, Request $request) {
        User::where('id', $user->id)->update([
            'name' => $request->name,
            'email' => $request->email
        ]);
        return response()->json([
            'status' => 200,
            'messages' => 'Berhasil Update Data!'
        ]);
    }

    public function search($keyword) {
        $data = User::where('name', 'LIKE', '%' . $keyword . '%')->get();
        return $data;
    }
}
