<?php

namespace App\Http\Controllers;

use App\Models\client;
use Exception;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function index()
    {
        $clients = Client::all();
        return view('client.index', compact('clients'));
    }

    public function create()
    {
        return view('client.create');
    }

    public function store(Request $request)
    {
        // return $request;
        try {
            $clients = new client();
            $clients->name = $request->name;
            $clients->price = $request->price;
            $clients->client_date = $request->client_date;
            $clients->save();
            toastr()->success("تم حفظ البيانات بنجاح");
            return redirect()->route('client.index');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $clients = Client::findorFail($id);
        return view('client.update', compact('clients'));
    }

    public function update(Request $request, $id)
    {
        try {
            $clients = client::findorFail($id);
            $clients->name = $request->name;
            $clients->price = $request->price;
            $clients->client_date = $request->client_date;
            $clients->save();
            toastr()->success("تم تعديل البيانات بنجاح");
            return redirect()->route('client.index');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        client::findOrFail($id)->delete();
        toastr()->success("تم حذف البيانات بنجاح");
        return redirect()->route('client.index');
    }
}
