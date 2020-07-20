<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FirstController extends Controller {


    public function __construct() {

        $this->middleware('auth')->except('showString2');
    }


    public function showString(){

        return "Hi show STring";
    }

    public function showString2(){

        return "Hi show STring2";
    }



}
