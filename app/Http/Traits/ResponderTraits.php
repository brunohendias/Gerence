<?php
namespace App\Http\Traits;

//use Illuminate\Support\Facades\Log;

trait ResponderTraits {

    public function RespSuccess($msg, $dados) {
        //Log::info($msg,$this->verificaEloquent($dados));
        return responder()->success($dados);
    }

    public function RespLogErro($e, $msg, $code) {
        //Log::error($msg, array('msg' => $msg, 'erro' => $e->getMessage()));
        return responder()->error($code, $msg);
    }

	public function RespErrorNormal($msg, $dados,$erro) {
		//Log::alert($msg,$dados);
		return responder()->error($erro,$dados['msg']);
	}
}