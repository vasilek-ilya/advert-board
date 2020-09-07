<?php


namespace App\Http\Controllers;

use App\Advert;
use App\Category;
use App\City;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvertController extends Controller
{
    const ADVERT_LIMIT = 20;

    public function all(Request $request)
    {
        // TODO: Pagination
        $adverts = $this->getAdvertBuilderByRequest($request)
            ->where('status', Advert::ACTIVE_STATUS)
            ->get();

        return view('advert.all', [
            'cities' => City::all(),
            'categories' => Category::all(),
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

    public function my(Request $request)
    {
        // TODO: Pagination
        $adverts = $this->getAdvertBuilderByRequest($request)
            ->where('user_id', Auth::id())
            ->get();

        return view('advert.my', [
            'cities' => City::all(),
            'categories' => Category::all(),
            'adverts' => $adverts,
        ]);
    }

    public function showAddForm(Request $request)
    {
        return view('advert.add', [
            'categories' => Category::all(),
            'cities' => City::all(),
        ]);
    }

    public function add(Request $request)
    {
        $validated_data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'ctg' => ['required'],
            'desc' => ['required'],
            'city' => ['required'],
            'price' => ['required', 'numeric'],
        ]);

        $advert = Advert::create([
            'title' => $validated_data['title'],
            'category_id' => $validated_data['ctg'],
            'description' => $validated_data['desc'],
            'city_id' => $validated_data['city'],
            'price' => $validated_data['price'],
            'pub_date' => now(),
            'user_id' => Auth::id(),
        ]);

        return redirect(route('my.adverts'));
    }

    public function showEditForm(Request $request, $advert_id)
    {
        $advert = Advert::where('user_id', Auth::id())
            ->where('id', $advert_id)
            ->first();

        if ($advert === null) {
            return back();
        }

        return view('advert.edit', [
            'advert' => $advert,
            'categories' => Category::all(),
            'cities' => City::all(),
        ]);
    }

    public function edit(Request $request)
    {
        $validated_data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'ctg' => ['required'],
            'desc' => ['required'],
            'city' => ['required'],
            'price' => ['required', 'numeric'],
            'advert' => ['required', 'numeric']
        ]);

        $advert = Advert::where('id', $validated_data['advert'])
            ->update([
                'title' => $validated_data['title'],
                'category_id' => $validated_data['ctg'],
                'description' => $validated_data['desc'],
                'city_id' => $validated_data['city'],
                'price' => $validated_data['price'],
            ]);

        return redirect(route('my.adverts'));
    }

    public function close(Request $request, $advert_id)
    {
        $advert = Advert::where('user_id', Auth::id())
            ->where('id', $advert_id)
            ->first();

        if ($advert === null) {
            return back();
        }

        $advert->close();

        return back();
    }

    protected function getAdvertBuilderByRequest(Request $request)
    {
        if ($search = $request->get('search')) {
            $adverts = Advert::search($search)->query(function ($builder) {
                $builder->with('city', 'main_photo')->limit(self::ADVERT_LIMIT);
            });
        } else {
            $adverts = Advert::with('city', 'main_photo')->limit(self::ADVERT_LIMIT);
        }

        if ($category_id = $request->get('ctg')) {
            $adverts->where('category_id', $category_id);
        }
        if ($city_id = $request->get('city')) {
            $adverts->where('city_id', $city_id);
        }

        return $adverts;
    }
}
