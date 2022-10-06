<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    public function imageUpload(UploadedFile $file,$disk){

      $extention = $file->getClientOriginalExtension();
      $file_name = time().'.'.$extention;
     $path =  Storage::disk($disk)->putFileAs('/user-images',$file,$file_name);

   return  Image::create(compact('disk','file_name','path'));

    }
}
