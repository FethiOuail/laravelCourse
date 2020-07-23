<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;

class CrudController extends Controller {


    public function create() {
        return view('');
    }

    public function getOffers(){

        //$offers = Offer::all();
        //$offers = Offer::get();
        $offers = Offer::select('id', 'name')->get();
        return $offers;

    }



    public function store()
    {
        Offer::create([
            'name' => 'Offer3',
            'price' => '2122',
            'details' => 'This is just test'
        ]);
    }


}
