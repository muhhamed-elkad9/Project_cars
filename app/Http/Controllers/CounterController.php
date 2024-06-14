<?php

namespace App\Http\Controllers;

use App\Models\Counter;
use Exception;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counters = Counter::all();
        return view('counter.index', compact('counters'));
    }

    public function create()
    {
        return view('counter.create');
    }

    public function store(Request $request)
    {
        // return $request;
        try {
            $Counters = new Counter();
            $Counters->value = $request->value;
            $Counters->date = $request->date;
            $Counters->save();
            toastr()->success("تم حفظ البيانات بنجاح");
            return redirect()->route('counter.index');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function edit($id)
    {
        $counters = Counter::find($id);
        return view('counter.update', compact('counters'));
    }

    public function update(Request $request, $id)
    {
        try {
            $Counters = Counter::find($id);
            $Counters->value = $request->value;
            $Counters->date = $request->date;
            $Counters->save();
            toastr()->success("تم تعديل البيانات بنجاح");
            return redirect()->route('counter.index');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function destroy($id)
    {
        Counter::findOrFail($id)->delete();
        toastr()->success("تم حذف البيانات بنجاح");
        return redirect()->route('counter.index');
    }
}
