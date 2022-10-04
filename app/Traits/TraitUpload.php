<?php
namespace App\Traits;

use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

trait TraitUpload{
   
    public function fileUpload($request,$fieldName)
    {
   
        if($request->$fieldName)
        {
            $arr =explode('.',$request->$fieldName);
            $ext = $arr[1];
            $file_name = str::slug($request->name).'-'. time().'.'.$ext;

            $file_path = "/public/storage/uploads/$file_name";
            $dataUpload = [
                'file_name' => $file_name,
                'file_path' => $file_path,
            ];
            $old_path = strstr($request->$fieldName,'public');
            $new_path = substr($dataUpload['file_path'],1);
            File::copy($old_path, $new_path);
            return $dataUpload;
            
        }
        return null;
    }
    public function fileUploadMuti($file,$name,$i)
    {       
        if(!empty($file)){
            $arr =explode('.',$file);
            $ext = $arr[1];
            $file_name = str::slug($name).'-detail-0'.$i.'-'.str::random(3).'.'.$ext;           
            $file_path = "/public/storage/uploads/$file_name";
        
            $dataUpload = [
                'file_name' => $file_name,
                'file_path' => $file_path
            ];     
            $old_path = strstr($file,'public');
            $new_path = substr($file_path,1);        
           $check =  File::copy($old_path, $new_path);
            return $dataUpload;
        }
        return null;
    }

}