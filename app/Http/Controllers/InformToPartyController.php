<?php

namespace App\Http\Controllers;

use App\Cases;
use App\InformToParty;
use Illuminate\Http\Request;

class InformToPartyController extends Controller
{
    public function index(Cases $cases)
    {
        // $partyDetails=PartyDetail::get();
        // return $partyDetails;
        $informToParties = InformToParty::where('cases_id',$cases->id)->get();
        return view('cases.inform_to_party.list',compact(['cases','informToParties']));
        // $partyDetails=PartyDetail::where('cases_id',$cases->id)->get();
        // $oppositParties=OppositParty::where('cases_id',$cases->id)->get();
        // return view('cases.detail',compact(['cases','partyDetails','oppositParties']));
    }
    public function create(Cases $cases, InformToParty $informToParty)
    {
        return view('cases.inform_to_party.index',compact(['cases','informToParty']));
    }
    public function store(Request $request)
    {
        InformToParty::create($request->validate([
            'cases_id'=>'required',
            'relation'=>"required",
            'info'=>"required",
            'heir_name'=>"required",
        ]));
        $cases=Cases::where('id',$request->cases_id)->get()[0];
     
        return redirect()->route('inform-to-party.index',$cases)->with('success',"पक्षलाई जानकारी सफलतापूर्वक थपियो");
    }

    public function destroy(InformToParty $informToParty)
    {
        $informToParty->delete();
        return redirect()->back()->with('success',"पक्षलाई जानकारी सफलतापूर्वक हटाइयो");
    }
    public function edit(InformToParty $informToParty)
    {
        $cases=InformToParty::where('cases_id',$informToParty->cases_id)->get()[0];
        return view('cases.inform_to_party.index',compact(['cases','informToParty']));
    }

    public function update(Request $request, InformToParty $informToParty)
    {
        // return $informToParty;
        # code...
        $informToParty->update($request->validate([
            
            'relation'=>"required",
            'info'=>"required",
            'heir_name'=>"required",
        ]));

        $cases=Cases::where('id',$informToParty->cases_id)->get()[0];
     
        return redirect()->route('inform-to-party.index',$cases)->with('success',"पक्षलाई जानकारी सफलतापूर्वक परिवर्तन भयो");
    }
}
