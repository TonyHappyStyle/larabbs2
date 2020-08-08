<?php
namespace App\Handlers;

use Illuminate\Support\Str;

class ImagesHandler
{
    protected $ext=['png','jpg','gif','jpeg'];

    public function save($file,$folder,$prefix)
    {
        $folder_name = 'uploads/images/'.$folder.'/'.date("Ym/d",time());

        $upload_path = public_path().'/'.$folder_name;

        $extention = strtolower($file->getClientOriginalExtension())?:'png';

        $file_name = $prefix.'_'.time().'_'.Str::random().'.'.$extention;

        if(!in_array($extention,$this->ext)){
            return false;
        }

        $file->move($upload_path,$file_name);

        $url_path = config('app.url')."/$folder_name/$file_name";

        return ['avatar' => $url_path];
    }
}
