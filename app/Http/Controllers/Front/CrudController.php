<?php

namespace App\Http\Controllers\Front;

use App\Events\VideoViewer;
use App\Http\Controllers\Controller;
use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use App\Models\Video;
use App\Traits\OfferTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


class CrudController extends Controller {


    use OfferTrait;

    public function getAllOffers() {
      //  $offers = Offer::all();

        $offers = Offer::select('id',
            'name_'.LaravelLocalization::getCurrentLocale() . ' as name',
            'price',
            'details_'.LaravelLocalization::getCurrentLocale() . ' as details'
        )->get();
        return view('offers.all')->with('offers',$offers);
    }

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

     /*   $name = $request->get('name');
        $price = $request->get('price');
        $details = $request->get('details');
*/
    //  dd($request);



        // insert data
       /* Offer::create([
            'name' => $name,
            'price' => $price,
            'details' => $details
        ]);
      */

        $file_name = $this->saveImage($request->photo, 'images/offers');

       // return "Okay";

        //insert
        Offer::create([

            'photo' => $file_name,
            'name_ar' => $request->name_ar,
            'name_en' =>   $request->name_en,
            'price' =>  $request->price,
            'details_ar' => $request->details_ar,
            'details_en' => $request->details_en,
        ]);

        return redirect()->back()->with(['success' => 'تمت الاضافة بنجاح']);

    }

    public function editOffer($id) {
    //  $offer = Offer::find($id);
        $offer = Offer::findOrFail($id);
        return view('offers.create')->with('offer',$offer);
    }

    public function updateOffer(OfferRequest $request, $id) {
        // validation
        // chek if offer exist
        $offer = Offer::find($id);
        if (!$offer)
            return redirect()->back();

        // update data

        // method 1
        $offer->update($request->all());

        // method 2
      /*  $offer->update([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'price'   => $request->price,
        ]);*/

        return redirect()->back()->with(['success' => 'تمت التعديل بنجاح']);
    }


    public function getOfferJson() {
        $offers = Offer::all();

        return $offers;
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


    public function getVideo() {

        $video = Video::first();

        event(new VideoViewer($video));

        return view('video')->with('video', $video);
    }


}
