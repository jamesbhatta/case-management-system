<?php

namespace App\Http\Controllers;

use App\Cases;
use App\Consultation;
use Illuminate\Http\Request;

class OtherCourtController extends Controller
{
    public function index(Cases $cases)
    {
        $consultations = Consultation::where('type',"otherCourt")->where('cases_id',$cases->id)->get();
        return view('cases.other_court.list', compact(['cases','consultations']));
    }
    public function create(Cases $cases, Consultation $consultation)
    {
       
        return view('cases.other_court.index', compact(['cases', 'consultation']));
    }

    public function store(Request $request)
    {
        Consultation::create($request->validate([
            'cases_id' => 'required',
            'date'=>"required",
            'recomandation'=>"nullable",
            'description'=>"nullable",
            'document'=>"nullable",
            'related_people'=>"nullable",
            'type'=>"required",
        ]));

        $cases = Cases::where('id', $request->cases_id)->get()[0];

        return redirect()->route('other-court.index', $cases)->with('success', "Added");
    }

    public function edit(Consultation $consultation)
    {
        $cases=Cases::where('id',$consultation->cases_id)->get()[0];
        return view('cases.other_court.index', compact(['cases', 'consultation']));
    }

    public function update(Request $request, Consultation $consultation)
    {
        $consultation->update($request->validate([
            
            'date'=>"required",
            'recomandation'=>"nullable",
            'description'=>"nullable",
            'document'=>"nullable",
            'related_people'=>"nullable",
        ]));

        $cases = Cases::where('id', $consultation->cases_id)->get()[0];

        return redirect()->route('other-court.index', $cases)->with('success', "Updated");
    }
    public function destroy(Consultation $consultation)
    {
        $consultation->delete();
       return redirect()->back()->with('success', "Deleted");
    }
}
