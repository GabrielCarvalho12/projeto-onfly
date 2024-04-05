<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserResource;
use App\Http\Requests\UserRegisterRequest;

class UserRegisterController extends Controller
{
    public function store(UserRegisterRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);
        $user = new UserResource($user);

        return response()->json([
            'message' => 'Usuário Cadastrado',
            'user' => $user
        ], 200);
    }
}
