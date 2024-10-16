<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AffiliateController extends Controller
{
    function introduce(){
        return view('client/pages/Affiliate/introduce');
    }
}
