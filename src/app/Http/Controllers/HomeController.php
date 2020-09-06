<?php

namespace App\Http\Controllers;

use App\City;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'cities' => City::all(),
        ]);
    }

    public function save(Request $request)
    {
        $validated_data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'city' => ['required'],
            'phone' => ['required', 'string', 'min:10', 'max:10'],
            'about' => [],
        ]);

        User::where('id', Auth::id())
            ->update([
                'name' => $validated_data['name'],
                'city_id' => $validated_data['city'],
                'phone' => $validated_data['phone'],
                'about' => $validated_data['about'],
            ]);

        return back();
    }
}
