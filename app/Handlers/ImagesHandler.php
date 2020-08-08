<?php
namespace App\Handlers;

use Illuminate\Support\Str;

class ImagesHandler
{
    protected $ext= ['png','jpg','gif','jpeg'];

    public function save($file,$folder,$file_prefix)
    {
        $folder_name = 'uploads/images/'.$folder.'/'.date('Ym/d',time());

        $upload_path = public_path().'/'.$folder_name;

        $extension = strtolower($file->getClientOriginalExtension())?:'png';

        $file_name = $file_prefix.'_'.time().'_'.Str::random().'.'.$extension;

        if(!in_array($extension,$this->ext)){
            return false;
        }

        $file->move($upload_path,$file_name);

        return [
            'path'=> config('app.url')."/$folder_name/$file_name",
        ];
    }
}
