<?php

namespace App\Http\Controllers;

use App\Models\car;
use App\Models\client;
use App\Models\process;
use Illuminate\Http\Request;

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

    public function index()
    {
        $totalProcess = process::sum('price');
        $countProcess = process::count();

        $totalClient = client::sum('price');
        $countClient = client::count();

        $totalCost = $totalProcess + $totalClient;

        if ($countProcess == 0) {
            $costRate = 0;
        } else {
            $costRate = round(($totalProcess / $totalCost) * 100, 1);
        }

        if ($countClient == 0) {
            $clientRate = 0;
        } else {
            $clientRate = round(($totalClient / $totalCost) * 100, 1);
        }


        $Cars = car::all();

        return view('dashboard', compact('totalProcess', 'totalClient', 'costRate', 'clientRate', 'Cars'));
    }
}
