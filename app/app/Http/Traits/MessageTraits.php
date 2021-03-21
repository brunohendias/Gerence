<?php
namespace App\Http\Traits;

trait MessageTraits {

    private array $messages = [
        'success' => [
            'search' => 'Buscamos :value com sucesso.',
            'register' => 'Cadastramos :value com sucesso.',
            'edit' => 'Editamos :value com sucesso.',
            'delete' => 'Deletamos :value com sucesso.'
        ],
        'error' => [
            'search' => 'Houve um erro ao buscarmos :value.',
            'register' => 'Houve um erro ao cadastrarmos :value.',
            'edit' => 'Houve um erro ao editarmos :value.',
            'delete' => 'Houve um erro ao deletarmos :value.'
        ],
        'notfound' => 'Não encontramos nenhum(a) :value.',
    ];

    protected function MsgSearch(string $string, string $tipo = 'success'): string
    {
        return str_replace(':value', $string, $this->messages[$tipo]['search']);
    }

    protected function MsgRegister(string $string, string $tipo = 'success'): string
    {
        return str_replace(':value', $string, $this->messages[$tipo]['register']);
    }

    protected function MsgEdit(string $string, string $tipo = 'success'): string
    {
        return str_replace(':value', $string, $this->messages[$tipo]['edit']);
    }

    protected function MsgDelete(string $string, string $tipo = 'success'): string
    {
        return str_replace(':value', $string, $this->messages[$tipo]['delete']);
    }

    protected function MsgNotFound(string $string): string
    {
        return str_replace(':value', $string, $this->messages['notfound']);
    }
}