<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use App\Traits\OfferTrait;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class OfferController extends Controller
{

    use OfferTrait;

    public function create()
    {
        // view form to add this offer
        return view('ajaxoffers.create');
    }

    public function store(OfferRequest $request)
    {
        // save offer into BD using AJAX


        $file_name = $this->saveImage($request->photo, 'images/offers');

        // return "Okay";

        //insert
        $offer = Offer::create([

            'photo' => $file_name,
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'price' => $request->price,
            'details_ar' => $request->details_ar,
            'details_en' => $request->details_en,
        ]);


        if ($offer) return response()->json([
            'status' => true,
            'msg' => 'تم الحفظ بنجاح',
        ]);

        else  return response()->json([
            'status' => false,
            'msg' => 'فشل في الحفظ',
        ]);

    }


    public function all(){

     //   $offers = Offer::all();

        $offers = Offer::select('id',
            'name_'.LaravelLocalization::getCurrentLocale() . ' as name',
            'price',
            'photo',
            'details_'.LaravelLocalization::getCurrentLocale() . ' as details'
        )->get();

        return view('ajaxoffers.all', compact('offers'));
    }

    public function delete(Request $request) {


        $offer = Offer::find($request->id);



        $offer->delete();

        if ($offer) return response()->json([
            'status' => true,
            'msg' => 'تم الحفظ بنجاح',
            'id' => $request->id ,
        ]);

        else  return response()->json([
            'status' => false,
            'msg' => 'فشل في الحفظ',
        ]);

    }

}
