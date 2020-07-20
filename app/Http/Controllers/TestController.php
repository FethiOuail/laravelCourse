<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller {


    public function show() {
        return 'Hello Show page!';
    }


    public function edit() {
        return 'Hello edit page!';
    }
}
