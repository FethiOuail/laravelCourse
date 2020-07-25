<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller {


    public function create() {
        return view('offers.create');
    }

    public function getOffers(){

        $offers = Offer::all();
        //$offers = Offer::get();
      //  $offers = Offer::select('id', 'name')->get();
        return $offers;

    }



    public function store(OfferRequest $request) {

        // validate data before insert to database

      //  $rules = $this->getRules();

   /*     $message_error =  [
            'name.required'   =>  __('messages.offer name required' ),
            'price.required'  => __('messages.offer price required'),
            'details.required' => __('offer details required'),
            'details.min'  => 'أظف معلومات أكثر',
        ];


        $validator = Validator::make($request->all(), $rules, $message_error);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

*/

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


        return redirect()->back()->with(['success' => 'تمت الاضافة بنجاح']);

    }




    /*
    protected function getRules() {

        return  [
            'name'    => 'required|min:3|max:100|unique:offers,name',
            'price'   => 'required|numeric',
            'details'   => 'required|min:5',
        ];
    }
*/

}
