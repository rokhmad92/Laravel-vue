<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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

    public function update($id, Request $request) {
        // User::where('id', $user->id)->update([
        //     'name' => $request->name,
        //     'email' => $request->email
        // ]);
        return $request->email;
    }
}
