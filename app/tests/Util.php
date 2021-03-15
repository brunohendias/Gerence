<?php

namespace Tests;

trait Util {
    
    protected $response;

    protected $msg;

    private $checkSuccess = [
        'status' => 200,
        'success' => true
    ];

    private $checkFailed = [
        'status' => 500,
        'success' => false
    ];

    protected function return_success() {
        return $this->response->assertStatus(200)
            ->assertJson($this->checkSuccess)
            ->assertJsonPath('data.msg', $this->msg);
    }

    protected function return_not_found() {
        return $this->response->assertStatus(200)
            ->assertJson($this->checkFailed)
            ->assertJsonPath('error.message', $this->msg);
    }
}