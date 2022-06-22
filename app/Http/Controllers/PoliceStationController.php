<?php

namespace App\Http\Controllers;

use App\Cases;
use App\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 

class PoliceStationController extends Controller
{
    public function index(Cases $cases)
    {
        $consultations = Consultation::where('type',"station")->where('cases_id',$cases->id)->get();
        return view('cases.station.list', compact(['cases','consultations']));
    }
    public function create(Cases $cases, Consultation $consultation)
    {
       
        return view('cases.station.index', compact(['cases', 'consultation']));
    }

    public function store(Request $request)
    {
        $input=$request->validate([
            'cases_id' => 'required',
            'date'=>"required",
            'recomandation'=>"nullable",
            'description'=>"nullable",
            'document'=>"nullable",
            'related_people'=>"nullable",
            'type'=>"required",
        ]);
        if ($file = $request->file('document')) {
            // return "hello";
            $filePath = 'document/';
            $Document = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($filePath, $Document);
            $input['document'] = "$Document";
        }
        Consultation::create($input);
        $cases = Cases::where('id', $request->cases_id)->get()[0];

        return redirect()->route('police-station.index', $cases)->with('success', "Added");
    }

    public function edit(Consultation $consultation)
    {
        $cases=Cases::where('id',$consultation->cases_id)->get()[0];
        return view('cases.station.index', compact(['cases', 'consultation']));
    }

    public function update(Request $request, Consultation $consultation)
    {
        $input=$request->validate([
           
            'date'=>"required",
            'recomandation'=>"nullable",
            'description'=>"nullable",
            'document'=>"nullable",
            'related_people'=>"nullable",
          
        ]);
        
        if ($file = $request->file('document')) {
            
            // return "hello";
            $filePath = 'document/';
            File::delete($filePath.$consultation->document);
            $Document = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($filePath, $Document);
            $input['document'] = "$Document";
        }
        $consultation->update($input);

        $cases = Cases::where('id', $consultation->cases_id)->get()[0];

        return redirect()->route('police-station.index', $cases)->with('success', "Updated");
    }
    public function destroy(Consultation $consultation)
    {
        $consultation->delete();
       return redirect()->back()->with('success', "Deleted");
    }
}
