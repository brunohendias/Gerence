<?php
namespace App\Http\Traits;

trait ResponderTraits {

    protected function RespSuccess($dados) {
        return responder()->success($dados);
    }

    protected function RespErrorNormal($msg, $code = 400) {
		return responder()->error($code, $msg);
	}

    protected function RespLogErro($e, $msg, $code = 500) {
        return responder()->error($code, $msg);
    }
}