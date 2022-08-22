<?php

namespace App\Http\Controllers;

use App\Cases;
use App\District;
use App\Municipality;
use App\OppositParty;
use App\PartyDetail;
use Illuminate\Http\Request;

class OppositPartyController extends Controller
{
    public function index(Cases $cases, OppositParty $oppositParty)
    {
        $oppositParties=OppositParty::where('cases_id',$cases->id)->get();
        return view('cases.opposit_party.list',compact(['cases','oppositParty','oppositParties']));

       
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
            'contact'=>"required|digits:10",
            'email'=>"nullable",
            'cast'=>"required",
            'religion'=>"required",
            'education'=>"required",
            'disability_status'=>"required",
            'family_number'=>"required",
            'disable_family_number'=>"required",
        ]);
        OppositParty::create($data);
        $cases=Cases::where('id',$request->cases_id)->get()[0];
       
        return redirect()->route('opposit-party.index',$cases)->with('success',"विपक्षको विवरण सफलतापूर्वक थपियो");
            
      
    }
    public function create(Cases $cases, OppositParty $oppositParty)
    {
        $districts=District::all();
        $municipalities=Municipality::all();
        return view('cases.opposit_party.index',compact(['cases','districts','municipalities','oppositParty']));
    }
    public function edit(OppositParty $oppositParty)
    {
        $cases=OppositParty::where('id',$oppositParty->id)->get()[0];
        $districts=District::get();
        $municipalities=Municipality::get();
        return view('cases.opposit_party.index',compact(['cases','oppositParty','districts','municipalities']));
    }

    public function update(Request $request, OppositParty $oppositParty)
    {
        $oppositParty->update($request->validate([
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
            'contact'=>"required|digits:10",
            'email'=>"nullable",
            'cast'=>"required",
            'religion'=>"required",
            'education'=>"required",
            'disability_status'=>"required",
            'family_number'=>"required",
            'disable_family_number'=>"required",
        ]));

        $cases=Cases::where('id',$oppositParty->cases_id)->get()[0];
            // return $cases;
        return redirect()->route('partydetail.index',$cases)->with('success',"विपक्षको विवरण सफलतापूर्वक परिवर्तन भयो");
    }
    public function destroy(OppositParty $oppositParty)
    {
        $oppositParty->delete();
        return redirect()->back()->with('success',"विपक्षको विवरण सफलतापूर्वक हटाइयो");
    }
}
