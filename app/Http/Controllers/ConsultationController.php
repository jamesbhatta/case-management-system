<?php

namespace App\Http\Controllers;

use App\Cases;
use App\Consultation;
use App\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ConsultationController extends Controller
{
    public function index(Cases $cases)
    {
        $consultations = Consultation::where('type', "pramarsh")->where('cases_id', $cases->id)->get();
        return view('cases.consultation.list', compact(['cases', 'consultations']));
    }

    public function create(Cases $cases, Consultation $consultation)
    {
        return view('cases.consultation.index', compact(['cases', 'consultation']));
    }

    public function store(Request $request)
    {

        $datas = $request->validate([
            'cases_id' => 'required',
            'date' => "required",
            'recomandation' => "nullable",
            'description' => "nullable",
            'document' => "nullable",
            'related_people' => "nullable",
            'type' => "required",
        ]);
        Consultation::create($datas);
        $cons=Consultation::latest()->first();
        if ($request->hasfile('document')) {
            foreach ($request->file('document') as $item) {
                $name=$item->getClientOriginalName();
                $data[] = $name;  
                // return $item;
                // return $request->file('document');
                    // return $image;
                    $datas['document'] = $item->store('documents');
                 
                Document::create([
                        'document' => $datas['document'],
                        'consultations_id' => $cons->id,
                        'type' => $request->type,
                    ]);
                }
                return $data;
        }

        // $cases = Cases::where('id', $request->cases_id)->get()[0];

        // return redirect()->route('consultation.index', $cases)->with('success', "Added");
    }

    public function edit(Consultation $consultation)
    {

        $cases = Cases::where('id', $consultation->cases_id)->get()[0];
        return view('cases.consultation.index', compact(['cases', 'consultation']));
    }

    public function update(Request $request, Consultation $consultation)
    {
        $input = $request->validate([

            'date' => "required",
            'recomandation' => "nullable",
            'description' => "nullable",
            'document' => "nullable",
            'related_people' => "nullable",

        ]);


        $consultation->update($input);

        foreach ($request->document as $item) {
            $datas['document'] = $item->store('documents');

            Document::create([
                'document' => $datas['document'],
                'consultations_id' => $consultation->id,
                'type' => $consultation->type,
            ]);
        }

        $cases = Cases::where('id', $consultation->cases_id)->get()[0];

        return redirect()->route('consultation.index', $cases)->with('success', "Update Successfully");
    }

    public function destroy(Consultation $consultation)
    {
        if ($consultation->document != "") {
            $filePath = 'document/';
            File::delete($filePath . $consultation->document);
        }
        $consultation->delete();
        $cases = Cases::where('id', $consultation->cases_id)->get()[0];
        return redirect()->route('consultation.index', $cases)->with('success', "Deleted");
    }
}
