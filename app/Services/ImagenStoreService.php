<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\images;
use App\Interfaces\ImageStoreInterface;

class ImagenStoreService implements ImageStoreInterface
{    
    private $storePath;

    public function __construct()
    {        
        $this->storePath = 'public/profile_images';
    }

    private function getUniqueFileName($data)
    {
        $uniqueId = uniqid();
        $extension = $data->getClientOriginalExtension();
        return "$uniqueId.$extension";
    }
    
    private function uploadFile($path, $filenametostore, $image)
    {        
        $path = $image->storeAs($path, $filenametostore);

        $paththumbnail = $image->storeAs($path.'/thumbnail', $filenametostore);    
        
        return $path && $paththumbnail;
    }

    private function resize($path, $filenametostore)
    {        
        $thumbnailpath = public_path($path.'/thumbnail/'.$filenametostore);

        $img = Image::make($thumbnailpath)->resize(400, 150, function($constraint) {
            $constraint->aspectRatio();
        });

        $img->save($thumbnailpath);
        
        return true;        
    }

    protected function upload($file, $owner) {              

            $fileName = $this->getUniqueFileName($file);
            
            $fullPath = $this->storePath."/".$owner."/";            
            //Upload File
            $successfulUpload = $this->uploadFile($fullPath, $fileName, $file);
           
            //Resize image here
            if ($successfulUpload){

                $this->resize($fullPath, $fileName);           

                return $fileName;
            }
            else 
              return null;    
    }

    public function store(StoreImageRequest $request, $iddoc){

        $file = $request->file('image');

        $successfulUpload = $this->upload($file, $iddoc);

        $saved = false;

            if ($successfulUpload) {
                
                $data= new Postimage();                                   
                
                $data['image'] = $fileName;
            
                $data->save();
            }

            return $saved;

    }

    
}
