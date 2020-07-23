<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller {


    public function create() {
        return view('offers.create');
    }

    public function getOffers(){

        //$offers = Offer::all();
        //$offers = Offer::get();
        $offers = Offer::select('id', 'name')->get();
        return $offers;

    }



    public function store(Request $request)
    {

        // validate data before insert to database

        $validator = Validator::make($request->all(), [
            'name'    => 'reuired|min:3|max:100',
            'price'   => 'requred|numeric',
            'details'   => 'requred',
        ]);

        $name = $request->get('name');
        $price = $request->get('price');
        $details = $request->get('details');

    //  dd($request);



        // insert data
        Offer::create([
            'name' => $name,
            'price' => $price,
            'details' => $details
        ]);
    }


}
