<?php

namespace App\Http\Controllers;

use App\Cases;
use App\Versp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VerspController extends Controller
{
    public function index(Versp $versp)
    {
        $versps = Versp::with('personalDetail')->get();
        // $versps=Versp::with('versps')->get();
        // return $versps;
        return view('versp.index', compact(['versp', 'versps']));
    }
    public function store(Request $request)
    {
        Versp::create($request->validate([
            'date' => "required",
            'type' => "required",
            'info' => "required",
        ]));
        return redirect()->back()->with('success', "Added");
    }

    public function edit(Versp $versp)
    {
        $versps = Versp::get();
        return view('versp.index', compact(['versp', 'versps']));
    }

    public function update(Request $request, Versp $versp)
    {
        $versp->update($request->validate([
            'date' => "required",
            'type' => "required",
            'info' => "required",
        ]));
        return redirect()->route('versp.index')->with('success', "Updated");
    }

    public function destroy(Versp $versp)
    {
        $versp->delete();
        return redirect()->back()->with('success', "Deleted");
    }
    public function search(Request $request, Versp $versp)
    {
        // $versps = DB::table('versps')->join('personal_details', 'versp_id', '=', 'versps.id')->where('versps.id', 1)->get();
    

        // return $versp;
        $versps=Versp::with('personalDetail')->where('first_name','=',$request->case_data)->get();
        return $versps;
        // return view('versp.index', compact(['versps','versp']));
    }
    public function dateFilter(Request $request, Versp $versp)
    {

        $versps = Versp::with('personalDetail')->whereBetween('date', [$request->start, $request->end])->get();
        // return $versps;
        return view('versp.index', compact(['versps', 'versp']));
    }
}
