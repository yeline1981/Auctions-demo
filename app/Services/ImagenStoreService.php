<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Postimage;


class ImagenStoreService implements ImageStoreInterface
{

    public function __construct(Storage $storage)
    {
        $this->storage = $storage;        
    }

    private function getUniqueFileName($data)
    {
        $uniqueId = uniqid();
        $extension = $data->getClientOriginalExtension();
        return "$uniqueId.$extension";
    }

    /*
    private function uploadFileS3($fullPath, StoreImageRequest $cv)
    {
        $fileContents = file_get_contents($cv);
        $this->storage->disk('s3')->put($fullPath, $fileContents);
        return $this->storage->disk('s3')->exists($fullPath);
    } 
    */
    
    private function uploadFile($filenametostore, $image)
    {
        $path = $this->storage->putFileAs(
            'public/profile_images', $filenametostore);

        $this->storage->putFileAs(
            'public/profile_images/thumbnail', $filenametostore);

        //$image->file('profile_image')->storeAs('public/profile_images/thumbnail', $filenametostore);  
        return $this->storage->disk('s3')->exists($fullPath);
    }

    public function resize($path, $filenametostore)
    {
        //$thumbnailpath = public_path('storage/profile_images/thumbnail/'.$filenametostore);
        $thumbnailpath = public_path($path.$filenametostore);
        $img = Image::make($thumbnailpath)->resize(400, 150, function($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($thumbnailpath);
        
        return true;        
    }

    protected function store($uploader, $owner, StoreImageRequest $imageData) {        
     
            //Upload File
            $this->uploadFile($imageData);
     
            //Resize image here
            $info = $this->resize($filenametostore);

            $data= new Postimage();

            if($request->file('image')){
                $file= $request->file('image');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('public/Image'), $filename);
                $data['image']= $filename;
            }
            $data->save();


            $fileName = $this->getUniqueFileName($imageData);

            if ($owner)
                $fullPath = "cv/$owner/$fileName";
            else
                $fullPath = "cv/anonymous/$fileName";

            $successfulUpload = $this->uploadFile($fullPath, $data);

            $saved = false;
            if ($successfulUpload) {
                $text = $this->getTextFromDocument($data);

                if ($text) {
                    // store the resume text in the db
                    $resume  = new Resume();
                    $resume->owner_id = $owner; // anonymous cv owner or user applicant id
                    $resume->uploader_id = $uploader; // admin id or user applicant id
                    $resume->file_name = $fileName; // contains the extension
                    $resume->content = $text;
                    $saved = $resume->save();
                }
            }

            return $saved;
            
        

    }

    
}
