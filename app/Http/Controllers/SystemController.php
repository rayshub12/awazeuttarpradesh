<?php

namespace App\Http\Controllers;

use App\Option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class SystemController extends Controller
{
  
    // Get Robots.txt
    public function getRobot(){
        $data['robots'] = file_get_contents(public_path('robots.txt'));
        return view('admin.system.robots', $data);
    }

    // Save Robot.txt
    public function postRobot(Request $request){
        file_put_contents(public_path('robots.txt'),$request->robots_txt);
        return back();
    }


    // Get .htaccess
    public function getHtaccess(){
        $data['htaccess'] = file_get_contents(public_path('.htaccess'));
        return view('admin.system.htaccess',$data);
    }

    // Save .htaccess
    public function postHtaccess(Request $request){
        file_put_contents(public_path('.htaccess'),$request->htaccess);
        return back();
    }

}
