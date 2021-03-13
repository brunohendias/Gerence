<?php
namespace App\Http\Traits;

trait ResponderTraits {

    protected function RespSuccess(array $dados): object
    {
        return responder()->success($dados);
    }

    protected function RespErrorNormal(string $msg, int $code = 400): object
    {
		return responder()->error($code, $msg);
	}

    protected function RespLogErro(object $e, string $msg, int $code = 500): object
    {
        return responder()->error($code, $msg);
    }
}