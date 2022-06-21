<?php

namespace App\Http\Controllers;

use App\Versp;
use Illuminate\Http\Request;

class VerspController extends Controller
{
    public function index(Versp $versp)
    {
        $versps=Versp::get();
        return view('versp.index',compact(['versp','versps']));
    }
    public function store(Request $request)
    {
        Versp::create($request->validate([
            'date'=>"required",
            'type'=>"required",
            'info'=>"required",
        ]));
        return redirect()->back()->with('success',"Added");
    }

    public function edit(Versp $versp)
    {
        $versps=Versp::get();
        return view('versp.index',compact(['versp','versps']));
    }

    public function update(Request $request, Versp $versp)
    {
        $versp->update($request->validate([
            'date'=>"required",
            'type'=>"required",
            'info'=>"required",
        ]));
        return redirect()->route('versp.index')->with('success',"Updated");
    }

    public function destroy(Versp $versp)
    {
        $versp->delete();
        return redirect()->back()->with('success',"Deleted");
    }
    
}
