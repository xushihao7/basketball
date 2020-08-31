<?php

namespace App\Http\Controllers\Index\Video;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    //
    public function Index(Request $request){
        if($request->ajax() && $request->post()){

        }else{
            return view('index.video.play');
        }
    }
}
