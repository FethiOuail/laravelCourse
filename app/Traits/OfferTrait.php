<?php

namespace App\Traits;

Trait OfferTrait {


    function saveImage($photo, $folde)
    {
        // save photo in folder
        $file_extension = $photo->getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $path = $folde ;
        $photo->move($path, $file_name);

        return $file_name;
    }

}
