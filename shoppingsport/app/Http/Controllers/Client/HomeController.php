<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Categoris;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Can;

class HomeController extends Controller
{
    public function index(){
        $category = Categoris::get();
        // dd($category);
        return view('client.pages.home-page');
    }
}
