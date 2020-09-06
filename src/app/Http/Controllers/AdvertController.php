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

        if ($search = $request->get('search')) {
            $adverts = Advert::search($search)->query(function ($builder) {
                $builder->with('city', 'main_photo')->active()->limit(self::ADVERT_LIMIT);
            });
        } else {
            $adverts = Advert::with('city', 'main_photo')->active()->limit(self::ADVERT_LIMIT);
        }

        if ($category_id = $request->get('ctg')) {
            $adverts->where('category_id', $category_id);
        }
        if ($city_id = $request->get('city')) {
            $adverts->where('city_id', $city_id);
        }

        // TODO: Pagination
        $adverts = $adverts->get();

        return view('advert.all', [
            'cities' => $cities,
            'categories' => $categories,
            'adverts' => $adverts,
        ]);
    }

    public function show(Request $request, $advert_id)
    {
        // TODO: With user && Get advert count of user
        $advert = Advert::findOrFail($advert_id);

        return view('advert.show', [
            'advert' => $advert,
        ]);
    }
}
