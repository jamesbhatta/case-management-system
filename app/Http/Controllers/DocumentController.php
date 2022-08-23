<?php

namespace App\Http\Controllers;

use App\Cases;
use App\Consultation;
use App\Document;
use Dotenv\Parser\Value;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index(Document $document, Consultation $consultation)
    {
        $cases = Cases::where('id', $consultation->cases_id)->get()[0];
        
        if($consultation->type=="pramarsh"){
            $value="परामर्श";
            $documents=Document::where('consultations_id',$consultation->id)->where('type','pramarsh')->get();
            
            return view('document.index', compact(['document', 'cases', 'consultation','documents','value']));
        } elseif($consultation->type=="sahajikaran"){
            $value="सहजीकरण";
            $documents=Document::where('consultations_id',$consultation->id)->where('type','sahajikaran')->get();
            return view('document.index', compact(['document', 'cases', 'consultation','documents','value']));
        }elseif($consultation->type=="masyoda"){
            $value="मस्यौदा";
            $documents=Document::where('consultations_id',$consultation->id)->where('type','masyoda')->get();
            return view('document.index', compact(['document', 'cases', 'consultation','documents','value']));
        }
        elseif($consultation->type=="debate"){
            $value="debate";
            $documents=Document::where('consultations_id',$consultation->id)->where('type',$value)->get();
            return view('document.index', compact(['document', 'cases', 'consultation','documents','value']));
        }elseif($consultation->type=="melmilap"){
            $value="melmilap";
            $documents=Document::where('consultations_id',$consultation->id)->where('type',$value)->get();
            return view('document.index', compact(['document', 'cases', 'consultation','documents','value']));
        }elseif($consultation->type=="judgement"){
            $value="judgement";
            $documents=Document::where('consultations_id',$consultation->id)->where('type',$value)->get();
            return view('document.index', compact(['document', 'cases', 'consultation','documents','value']));
        }elseif($consultation->type=="station"){
            $value="station";
            $documents=Document::where('consultations_id',$consultation->id)->where('type',$value)->get();
            return view('document.index', compact(['document', 'cases', 'consultation','documents','value']));
        }
        elseif($consultation->type=="districtCourt"){
            $value="districtCourt";
            $documents=Document::where('consultations_id',$consultation->id)->where('type',$value)->get();
            return view('document.index', compact(['document', 'cases', 'consultation','documents','value']));
        }elseif($consultation->type=="highCourt"){
            $value="highCourt";
            $documents=Document::where('consultations_id',$consultation->id)->where('type',$value)->get();
            return view('document.index', compact(['document', 'cases', 'consultation','documents','value']));
        }elseif($consultation->type=="supremeCourt"){
            $value="supremeCourt";
            $documents=Document::where('consultations_id',$consultation->id)->where('type',$value)->get();
            return view('document.index', compact(['document', 'cases', 'consultation','documents','value']));
        }elseif($consultation->type=="otherCourt"){
            $value="otherCourt";
            $documents=Document::where('consultations_id',$consultation->id)->where('type',$value)->get();
            return view('document.index', compact(['document', 'cases', 'consultation','documents','value']));
        }
        elseif($consultation->type=="localLevel"){
            $value="localLevel";
            $documents=Document::where('consultations_id',$consultation->id)->where('type',$value)->get();
            return view('document.index', compact(['document', 'cases', 'consultation','documents','value']));
        }elseif($consultation->type=="decision"){
            $value="decision";
            $documents=Document::where('consultations_id',$consultation->id)->where('type',$value)->get();
            return view('document.index', compact(['document', 'cases', 'consultation','documents','value']));
        }
        elseif($consultation->type=="rejected"){
            $value="rejected";
            $documents=Document::where('consultations_id',$consultation->id)->where('type',$value)->get();
            return view('document.index', compact(['document', 'cases', 'consultation','documents','value']));
        }

        
        // return $documents;
        
    }

    public function store(Request $request)
    {
        // return $request;
        $datas = $request->validate([

            'document' => "required",
            'consultations_id'=>"required",
            'type'=>"required",
        ]);
        // if ($file = $request->file('document')) {
        //     // return "hello";
        //     $filePath = 'document/';
        //     $Document = date('YmdHis') . "." . $file->getClientOriginalExtension();
        //     $file->move($filePath, $Document);
        //     $input['document'] = "$Document";
        // }
        if ($request->hasFile('document')) {
            $datas['document'] = $request->file('document')->store('documents');
        }
        Document::create($datas);
        // $cases = Cases::where('id', $request->cases_id)->get()[0];

        return redirect()->back()->with('success', "Added");
    }

    public function destroy(Document $document)
    {
        // return $document;
        // $filePath = 'document/';
        // File::delete($filePath.$document->document);
        // $document->delete();
        // return $document->document;
        Storage::delete($document->document);
        $document->delete();
        return redirect()->back()->with('success',"Removed");
    }
}
