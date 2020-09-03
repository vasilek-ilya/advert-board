<?php


namespace App\Http\Controllers;

use App\Advert;
use App\Category;
use App\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdvertController extends Controller
{
    const ADVERT_LIMIT = 20;

    public function all(Request $request)
    {
        $cities = City::pluck('name');

        $categories = Category::pluck('name');

        $adverts = Advert::with('city', 'main_photo')
            ->active()->limit(self::ADVERT_LIMIT)->get();

        return view('advert.all', [
            'cities' => $cities->toJson(),
            'categories' => $categories->toJson(),
            'adverts' => $adverts,
        ]);
    }
}
