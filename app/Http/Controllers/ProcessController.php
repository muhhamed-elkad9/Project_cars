<?php

namespace App\Http\Controllers;

use App\Models\Counter;
use App\Models\process;
use App\Models\product;
use App\Models\Supplier;
use Exception;
use Illuminate\Http\Request;

class ProcessController extends Controller
{

    public function index()
    {
        $process = process::all();
        return view('process.index', compact('process'));
    }


    public function create()
    {
        $suppliers = Supplier::all();
        $products = product::all();
        $counters = Counter::all();
        return view('process.create', compact('suppliers', 'products', 'counters'));
    }


    public function store(Request $request)
    {
        // return $request;
        try {
            $process = new process();
            $process->supplier_id = $request->supplier_id;
            $process->product_id = $request->product_id;
            $process->counter_value = $request->counter_value;
            $process->price = $request->price;
            $process->processes_date = $request->processes_date;
            $process->save();
            toastr()->success("تم حفظ البيانات بنجاح");
            return redirect()->route('process.index');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $suppliers = Supplier::all();
        $products = product::all();
        $counters = Counter::all();
        $process = process::find($id);
        return view('process.update', compact('process', 'suppliers', 'products', 'counters'));
    }

    public function update(Request $request, $id)
    {
        try {
            $process = process::find($id);
            $process->supplier_id = $request->supplier_id;
            $process->product_id = $request->product_id;
            $process->counter_value = $request->counter_value;
            $process->price = $request->price;
            $process->processes_date = $request->processes_date;
            $process->save();
            toastr()->success("تم تعديل البيانات بنجاح");
            return redirect()->route('process.index');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        process::findOrFail($id)->delete();
        toastr()->success("تم حذف البيانات بنجاح");
        return redirect()->route('process.index');
    }
}
