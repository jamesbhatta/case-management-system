<?php

namespace App\Http\Controllers;

use App\Cases;
use App\District;
use App\Municipality;
use App\PartyDetail;
use Illuminate\Http\Request;

class PartyDetailController extends Controller
{
    public function store(Request $request)
    {
        // return $request;
        $data=$request->validate([
            'cases_id'=>"required",
            'first_name'=>"required",
            'middle_name'=>"nullable",
            'last_name'=>"required",
            'dob'=>"required",
            'age'=>"required",
            'gender'=>"required",
            'marrige_status'=>"required",
            'district'=>"required",
            'municipality'=>"required",
            'ward'=>"required",
            'contact'=>"required",
            'email'=>"nullable",
            'cast'=>"required",
            'religion'=>"required",
            'education'=>"required",
            'disability_status'=>"required",
            'family_number'=>"required",
            'disable_family_number'=>"required",
        ]);
        PartyDetail::create($data);
        return redirect()->back()->with('success',"Added");
      
    }
    public function create(Cases $cases)
    {
        $districts=District::all();
        $municipalities=Municipality::all();
        return view('cases.partyDetails.create',compact(['cases','districts','municipalities']));
    }
    public function destroy(PartyDetail $partyDetail)
    {
        $partyDetail->delete();
        return redirect()->back()->with('success',"Successfully delete");
    }
    public function edit(PartyDetail $partyDetail,Cases $cases)
    {
        $districts=District::all();
        $municipalities=Municipality::all();
        return view('cases.partyDetails.create',compact(['cases','districts','municipalities','partyDetail']));
    }
}
