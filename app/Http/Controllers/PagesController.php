<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function root()
    {
        return view('pages.root');
    }

    public function permissionDenied()
    {
        dd(config('administrator.permission')());
        if(config('administrator.permission')){
            dd(\Auth::user()->can('manage_contents'));
            return redirect(url(config('administrator.uri')),302);
        }
        dd('test1');
        return view('pages.permission_denied');
    }
}
