<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SupplierController extends Controller
{

    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(Request $request)
    {
        // return $request;
        try {
            $Suppliers = new Supplier();
            $Suppliers->name = $request->name;
            $Suppliers->email = $request->email;
            // $Suppliers->password = Hash::make($request->password);
            $Suppliers->save();
            toastr()->success("تم حفظ البيانات بنجاح");
            return redirect()->route('supplier.index');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $suppliers = Supplier::find($id);
        return view('suppliers.update', compact('suppliers'));
    }

    public function update(Request $request, $id)
    {
        try {
            $Suppliers = Supplier::find($id);
            $Suppliers->name = $request->name;
            $Suppliers->email = $request->email;
            // $Suppliers->password = Hash::make($request->password);
            $Suppliers->save();
            toastr()->success("تم تعديل البيانات بنجاح");
            return redirect()->route('supplier.index');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        Supplier::findOrFail($id)->delete();
        toastr()->success("تم حذف البيانات بنجاح");
        return redirect()->route('supplier.index');
    }
}
