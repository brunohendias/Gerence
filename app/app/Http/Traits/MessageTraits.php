<?php
namespace App\Http\Traits;

trait MessageTraits {
    protected function MsgSearch(string $string, string $tipo = 'success'): string
    {// $this->messages[$tipo]['search']
        return str_replace(':value', $string, __("messages.$tipo.search"));
    }

    protected function MsgRegister(string $string, string $tipo = 'success'): string
    {
        return str_replace(':value', $string,  __("messages.$tipo.register"));
    }

    protected function MsgEdit(string $string, string $tipo = 'success'): string
    {
        return str_replace(':value', $string,  __("messages.$tipo.edit"));
    }

    protected function MsgDelete(string $string, string $tipo = 'success'): string
    {
        return str_replace(':value', $string,  __("messages.$tipo.delete"));
    }

    protected function MsgNotFound(string $string): string
    {
        return str_replace(':value', $string,  __('messages.notfound'));
    }
}