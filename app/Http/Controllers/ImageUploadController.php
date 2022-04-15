<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreImageRequest;

class ImageUploadController extends Controller
{  

    //Add image
    public function addImage(){
        return view('add_image');
    }

    //Store image
    public function storeImage(StoreImageRequest $request, ImagenStoreService $service){
       /*Logic to store data*/
       $saved = $service->store($request);

       if ($saved){
            return redirect()->route('images.view');
            //return response()->json('success', 200);
       }
            
       
       return response()->json('error', 500);

    }
		//View image
    public function viewImage(){
        return view('view_image');
    }
}
