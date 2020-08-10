<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function delete()
    {
        if (request('permanently', 'no') == 'yes') {
            DB::table(request('table'))->where(request('col'), request('value'))->delete();
        } else {
            DB::table(request('table'))->where(request('col'), request('value'))->update([
                request('publish') => 0
            ]);
        }

        session()->flash('success', 'The ' . request('label') . ' has been deleted successfully');

        if (request('redirect')) {
            return redirect(request('redirect'));
        }

        return redirect()->back();
    }

    public function getCitiesOfState(){
        $cities = City::where('state_id', request('state_id'))
            ->get()
            ->pluck('name', 'id');

        return response()->json($cities);
    }
}
