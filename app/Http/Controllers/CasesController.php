<?php

namespace App\Http\Controllers;

use App\Cases;
use App\PartyDetail;
use Illuminate\Http\Request;

class CasesController extends Controller
{
    public function index(Cases $cases)
    {
        $allCases = Cases::all();
        return view('cases.manage', compact(['allCases','cases']));
    }
    public function store(Request $request)
    {

        Cases::create($request->validate([
            'serial_number' => "required",
            'case_number' => "required",
            'date' => "required",
            'case_status' => "required",
        ]));

        return redirect()->back()->with('success', "मुद्दा सफलतापूर्वक दर्ता भयो");
    }
    public function destroy(Cases $cases)
    {
        $cases->delete();
        return redirect()->back()->with('success', "मुद्दा सफलतापूर्वक हटाइयो");
    }
    public function edit(Cases $cases)
    {
        $allCases = Cases::all();
        return view('cases.index', compact(['allCases', 'cases']));
    }
    public function update(Request $request,Cases $cases)
    {
        $cases->update($request->validate([
            'serial_number' => "required",
            'case_number' => "required",
            'date' => "required",
            'case_status' => "required",
        ]));
        return redirect()->back()->with('success',"मुद्दा सफलतापूर्वक अपडेट भयो");
    }
    public function create(Cases $cases)
    {
        $allCases = Cases::all();
        return view('cases.index', compact(['allCases','cases']));
    }
    
}
