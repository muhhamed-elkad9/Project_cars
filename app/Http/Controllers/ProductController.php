<?php

namespace App\Http\Controllers;

use App\Models\Counter;
use App\Models\process;
use App\Models\product;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = product::all();

        // جلب أحدث تاريخ
        $latestDate = Counter::max('date');

        // جلب البيانات المرتبطة بأحدث تاريخ
        $counters = Counter::where('date', $latestDate)->get();


        foreach ($counters as $counter) {
            $counter_value = $counter->value;
        }

        return view('product.index', compact('products', 'counter_value'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        // return $request;
        try {
            $Products = new product();
            $Products->product_name = $request->product_name;
            $Products->product_date_day = $request->product_date_day;
            $Products->product_date_distance = $request->product_date_distance;
            $Products->save();
            toastr()->success("تم حفظ البيانات بنجاح");
            return redirect()->route('product.index');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $products = product::find($id);
        return view('product.update', compact('products'));
    }

    public function update(Request $request, $id)
    {
        try {
            $Products = product::find($id);
            $Products->product_name = $request->product_name;
            $Products->product_date_day = $request->product_date_day;
            $Products->product_date_distance = $request->product_date_distance;
            $Products->save();
            toastr()->success("تم تعديل البيانات بنجاح");
            return redirect()->route('product.index');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        product::findOrFail($id)->delete();
        toastr()->success("تم حذف البيانات بنجاح");
        return redirect()->route('product.index');
    }
}
