<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Tutors;
use Artisan;
use Illuminate\Http\Request;
use Validator, Input, Redirect, Session, Storage;

use App\Http\Requests;

class Start_landing_page extends Controller
{
    public function index()
    {
        return view('pages.landing_page');    
    }

    public function about(){
        return view('pages.contact');
    }

    public function properties(){
        return view('pages.properties');
    }

    public function courses(){
        return view('pages.courses');
    }

    public function profit(){
        return view('pages.profit');
    }
    
    public function general_search_2(Request $request)
    {   

        $name = $request->name;
        $data['t_data']=$name;
        var_dump($data); die();



        //return redirect('/home');
        return view('pages.home');
    }

    public function clearCache() {
        $exitCode = Artisan::call('config:clear');
        $exitCode = Artisan::call('config:cache');
        $exitCode = Artisan::call('view:clear');
        $exitCode = Artisan::call('route:clear');
        $exitCode = Artisan::call('route:cache');
        $exitCode = Artisan::call('cache:clear');
        // return what you want
    }
}   

