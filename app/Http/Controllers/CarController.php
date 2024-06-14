<?php

namespace App\Http\Controllers;

use App\Models\car;
use App\Models\counter;
use Exception;
use Illuminate\Http\Request;

class CarController extends Controller
{

    public function index()
    {
        $cars = car::all();
        return view('car.index', compact('cars'));
    }

    public function create()
    {
        // جلب أحدث تاريخ
        $latestDate = Counter::max('date');

        // جلب البيانات المرتبطة بأحدث تاريخ
        $counters = Counter::where('date', $latestDate)->get();

        return view('car.create', compact('counters'));
    }

    public function store(Request $request)
    {
        // return $request;
        try {
            $Cars = new car();
            $Cars->car_name = $request->car_name;
            $Cars->company_name_made = $request->company_name_made;
            $Cars->car_year_buy = $request->car_year_buy;
            $Cars->car_number = $request->car_number;
            $Cars->car_number_serial = $request->car_number_serial;
            $Cars->car_year_made = $request->car_year_made;
            $Cars->car_age = $request->car_age;
            $Cars->traveled_distance = $request->traveled_distance;
            $Cars->car_value_buy = $request->car_value_buy;
            $Cars->current_value = $request->current_value;
            $Cars->save();
            toastr()->success("تم حفظ البيانات بنجاح");
            return redirect()->route('car.index');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $cars = car::find($id);
        return view('car.update', compact('cars'));
    }

    public function update(Request $request, $id)
    {
        try {
            $Cars = car::find($id);
            $Cars->car_name = $request->car_name;
            $Cars->company_name_made = $request->company_name_made;
            $Cars->car_year_buy = $request->car_year_buy;
            $Cars->car_number = $request->car_number;
            $Cars->car_number_serial = $request->car_number_serial;
            $Cars->car_year_made = $request->car_year_made;
            $Cars->car_age = $request->car_age;
            $Cars->traveled_distance = $request->traveled_distance;
            $Cars->car_value_buy = $request->car_value_buy;
            $Cars->current_value = $request->current_value;
            $Cars->save();
            toastr()->success("تم تعديل البيانات بنجاح");
            return redirect()->route('car.index');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function destroy($id)
    {
        car::findOrFail($id)->delete();
        toastr()->success("تم حذف البيانات بنجاح");
        return redirect()->route('car.index');
    }
}
