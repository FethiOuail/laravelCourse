<?php

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use stdClass;

class UserController extends Controller {


    public function getIndex() {


        $data = [];
        $data['id'] = "1";

        $data['name'] = "Anwar Kamel";


        $obj = new stdClass();

        $obj->id = 2 ;
        $obj->name = "Anwar Ouail";


       // return view('welcome')->with("data",$data);
        return view('welcome', compact('obj'));
    }



    public function showAdmin() {
        return 'Hello Anwar How Are you!';
    }

    public function show() {
        return 'Hello Show page!';
    }


    public function edit() {
        return 'Hello edit page!';
    }


}
