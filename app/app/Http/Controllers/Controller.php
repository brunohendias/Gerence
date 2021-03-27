<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Http\Traits\ResponderTraits as Responder;
use App\Http\Traits\MessageTraits as Message;
use App\Http\Traits\UtilTraits as Util;

class Controller extends BaseController
{
    use Util, Responder, Message;
}