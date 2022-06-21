<?php

namespace App\Http\Controllers;

use App\Cases;
use App\District;
use App\Municipality;
use App\OppositParty;
use App\PartyDetail;
use Illuminate\Http\Request;

class PartyDetailController extends Controller
{
    public function index(Cases $cases)
    {
        $partyDetails=PartyDetail::where('cases_id',$cases->id)->get();
        // return $partyDetails;
        return view('cases.partyDetails.list',compact(['cases','partyDetails']));
        // $partyDetails=PartyDetail::where('cases_id',$cases->id)->get();
        // $oppositParties=OppositParty::where('cases_id',$cases->id)->get();
        // return view('cases.detail',compact(['cases','partyDetails','oppositParties']));
    }
    public function store(Request $request)
    {
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
        $cases=Cases::where('id',$request->cases_id)->get()[0];
        // return $cases;
        // $partyDetails=PartyDetail::all();
        // return view('cases.detail',compact(['cases','partyDetails']));
        return redirect()->route('partydetail.index',$cases)->with('success',"Added");
            
      
    }
    
    public function create(Cases $cases, PartyDetail $partyDetail)
    {
        $districts=District::all();
        $municipalities=Municipality::all();
        return view('cases.partyDetails.index',compact(['cases','districts','municipalities','partyDetail']));
    }
    public function destroy(PartyDetail $partyDetail)
    {
        $partyDetail->delete();
        return redirect()->back()->with('success',"Successfully delete");
    }
    public function edit(PartyDetail $partyDetail)
    {
        $cases  = Cases::where('id',$partyDetail->cases_id)->get()[0];
        // return $cases;
        $districts=District::all();
        $municipalities=Municipality::all();
        return view('cases.partyDetails.index',compact(['cases','districts','municipalities','partyDetail']));
    }

    public function update(Request $request, PartyDetail $partyDetail)
    {
        $partyDetail->update($request->validate([
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
        ]));

        $cases=Cases::where('id',$partyDetail->cases_id)->get()[0];
            // return $cases;
        return redirect()->route('partydetail.index',$cases)->with('success',"updated");
    }
}
