<?php
namespace App\Handlers;

use Illuminate\Support\Str;
use Image;

class ImagesHandler
{
    protected $ext= ['png','jpg','gif','jpeg'];

    public function save($file,$folder,$file_prefix,$maxWidth = false)
    {
        $folder_name = 'uploads/images/'.$folder.'/'.date('Ym/d',time());

        $upload_path = public_path().'/'.$folder_name;

        $extension = strtolower($file->getClientOriginalExtension())?:'png';

        $file_name = $file_prefix.'_'.time().'_'.Str::random().'.'.$extension;

        if(!in_array($extension,$this->ext)){
            return false;
        }

        $file->move($upload_path,$file_name);

        $this->resizeImage($upload_path.'/'.$file_name,$maxWidth);

        return [
            'path'=> config('app.url')."/$folder_name/$file_name",
        ];
    }

    protected function resizeImage($file,$maxWidth){
        $img = Image::make($file);
        $img->resize($maxWidth, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $img->save();
    }
}
