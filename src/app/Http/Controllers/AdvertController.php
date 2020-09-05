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
        $cities = City::all();

        $categories = Category::all();

        // TODO: Pagination
        $adverts = Advert::with('city', 'main_photo');
        if ($category_id = $request->get('ctg')) {
            $adverts->where('category_id', $category_id);
        }
        if ($city_id = $request->get('city')) {
            $adverts->where('city_id', $city_id);
        }

        $adverts = $adverts->active()->limit(self::ADVERT_LIMIT)->get();

        return view('advert.all', [
            'cities' => $cities,
            'categories' => $categories,
            'adverts' => $adverts,
        ]);
    }
}
