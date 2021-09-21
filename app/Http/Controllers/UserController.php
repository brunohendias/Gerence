<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Show the user logged.
     */
    public function show(): object
    {
        try {
            $user = auth()->user();
            
            $dados = [
                'msg' => 'Buscamos esse usuario com sucesso',
                'user' => $user,
                'token' => $user->createToken($user->name)->plainTextToken
            ];

            return $this->RespSuccess($dados);
        } catch (\Exception $e) {
            $msg = $this->MsgSearch('esse usuario', 'error');
            return $this->RespLogErro($e, $msg);
        }
    }
}
