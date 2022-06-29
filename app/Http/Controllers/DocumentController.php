<?php

namespace App\Http\Controllers;

use App\Cases;
use App\Consultation;
use App\Document;
use Dotenv\Parser\Value;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
class DocumentController extends Controller
{
    public function index(Document $document, Consultation $consultation)
    {
        $cases = Cases::where('id', $consultation->cases_id)->get()[0];
        if($consultation->type=="pramarsh"){
            $value="परामर्श";
            $documents=Document::where('consultations_id',$consultation->id)->where('type','परामर्श')->get();
            return view('document.index', compact(['document', 'cases', 'consultation','documents','value']));
        } elseif($consultation->type=="sahajikaran"){
            $value="सहजीकरण";
            $documents=Document::where('consultations_id',$consultation->id)->where('type','सहजीकरण')->get();
            return view('document.index', compact(['document', 'cases', 'consultation','documents','value']));
        }
       
        
        // return $documents;
        
    }

    public function store(Request $request)
    {
        // return $request;
        $input = $request->validate([

            'document' => "required",
            'consultations_id'=>"required",
            'type'=>"required",
        ]);
        if ($file = $request->file('document')) {
            // return "hello";
            $filePath = 'document/';
            $Document = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($filePath, $Document);
            $input['document'] = "$Document";
        }
        Document::create($input);
        // $cases = Cases::where('id', $request->cases_id)->get()[0];

        return redirect()->back()->with('success', "Added");
    }

    public function destroy(Document $document)
    {
        // return $document;
        $filePath = 'document/';
        File::delete($filePath.$document->document);
        $document->delete();
        return redirect()->back()->with('success',"Removed");
    }
}
