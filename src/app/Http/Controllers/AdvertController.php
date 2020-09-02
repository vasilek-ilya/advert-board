<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdvertController extends Controller
{
    public function all(Request $request)
    {
        return view('advert.all');
    }
}
