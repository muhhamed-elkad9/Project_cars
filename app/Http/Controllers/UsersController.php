<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        try {
            $Users = new User();
            $Users->name = $request->name;
            $Users->email = $request->email;
            $Users->password = Hash::make($request->password);
            $Users->save();
            toastr()->success("تم حفظ البيانات بنجاح");
            return redirect()->route('users.index');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $users = User::findorFail($id);
        return view('users.update', compact('users'));
    }

    public function update(Request $request, $id)
    {
        try {
            $Users = User::findorFail($id);
            $Users->name = $request->name;
            $Users->email = $request->email;
            $Users->password = Hash::make($request->password);
            $Users->save();
            toastr()->success("تم تحديث البيانات بنجاح");
            return redirect()->route('users.index');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        toastr()->success("تم حذف البيانات بنجاح");
        return redirect()->route('users.index');
    }
}
