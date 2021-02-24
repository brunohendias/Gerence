<?php

namespace Tests;

trait Util {
    
    public $response;

    public $msg;

    private $checkSuccess = [
        'status' => 200,
        'success' => true
    ];

    private $checkFailed = [
        'status' => 400,
        'success' => false
    ];

    public function return_success() {
        $this->response->assertStatus(200)
            ->assertJson($this->checkSuccess)
            ->assertJsonPath('data.msg', $this->msg);
    }

    public function return_failed() {
        $this->response->assertStatus(200)
            ->assertJson($this->checkFailed)
            ->assertJsonPath('data.msg', $this->msg);
    }
}