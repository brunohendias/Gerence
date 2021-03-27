<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show(): object
    {
        $entidade = 'esse usuario';
        try {
        	$dados = Auth::user();

            if ($this->Objetovazio($dados)) {
                $msg = $this->MsgNotFound('usuario');
                return $this->RespErrorNormal($msg);
            }

            $msg = $this->MsgSearch($entidade);
            return $this->RespSuccess(array('msg' => $msg, 'dados' => $dados));
        } catch (\Exception $exception) {
            $msg = $this->MsgSearch($entidade, 'error');
            return $this->RespLogErro($exception, $msg);
        }
    }

    public function logout(): object
    {
        try {
        	Auth::logout();

            $msg = 'Deslogamos você com sucesso';
            return $this->RespSuccess(array('msg' => $msg));
        } catch (\Exception $exception) {
            $msg = 'Houve um erro ao tentar deslogar você do sistema';
            return $this->RespLogErro($exception, $msg);
        }
    }
}