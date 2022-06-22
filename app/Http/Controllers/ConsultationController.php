<?php

namespace App\Http\Controllers;

use App\Cases;
use App\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function index(Cases $cases)
    {
        $consultations = Consultation::where('type',"pramarsh")->where('cases_id',$cases->id)->get();
        return view('cases.consultation.list', compact(['cases','consultations']));
    }

    public function create(Cases $cases, Consultation $consultation)
    {
        return view('cases.consultation.index', compact(['cases', 'consultation']));
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

        return redirect()->route('consultation.index', $cases)->with('success', "Added");
    }

    public function edit(Consultation $consultation)
    {
       
        $cases=Cases::where('id',$consultation->cases_id)->get()[0];
        return view('cases.consultation.index', compact(['cases', 'consultation']));
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

        return redirect()->route('consultation.index', $cases)->with('success', "Added");
    }
    public function destroy(Consultation $consultation)
    {
        $consultation->delete();
        $cases = Cases::where('id', $consultation->cases_id)->get()[0];
        return redirect()->route('consultation.index', $cases)->with('success', "Deleted");
    }
   
}
