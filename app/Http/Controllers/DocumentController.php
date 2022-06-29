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
        }elseif($consultation->type=="masyoda"){
            $value="मस्यौदा";
            $documents=Document::where('consultations_id',$consultation->id)->where('type','मस्यौदा')->get();
            return view('document.index', compact(['document', 'cases', 'consultation','documents','value']));
        }
        elseif($consultation->type=="debate"){
            $value="बहस";
            $documents=Document::where('consultations_id',$consultation->id)->where('type',$value)->get();
            return view('document.index', compact(['document', 'cases', 'consultation','documents','value']));
        }elseif($consultation->type=="melmilap"){
            $value="मेलमिलाप";
            $documents=Document::where('consultations_id',$consultation->id)->where('type',$value)->get();
            return view('document.index', compact(['document', 'cases', 'consultation','documents','value']));
        }elseif($consultation->type=="judgement"){
            $value="फैसला कार्यान्वयन";
            $documents=Document::where('consultations_id',$consultation->id)->where('type',$value)->get();
            return view('document.index', compact(['document', 'cases', 'consultation','documents','value']));
        }elseif($consultation->type=="station"){
            $value="प्रहरी कार्यालय";
            $documents=Document::where('consultations_id',$consultation->id)->where('type',$value)->get();
            return view('document.index', compact(['document', 'cases', 'consultation','documents','value']));
        }
        elseif($consultation->type=="districtCourt"){
            $value="प्जिल्ला अदालत";
            $documents=Document::where('consultations_id',$consultation->id)->where('type',$value)->get();
            return view('document.index', compact(['document', 'cases', 'consultation','documents','value']));
        }elseif($consultation->type=="highCourt"){
            $value="उच्च अदालत";
            $documents=Document::where('consultations_id',$consultation->id)->where('type',$value)->get();
            return view('document.index', compact(['document', 'cases', 'consultation','documents','value']));
        }elseif($consultation->type=="supremeCourt"){
            $value="सर्वोच्च अदालत";
            $documents=Document::where('consultations_id',$consultation->id)->where('type',$value)->get();
            return view('document.index', compact(['document', 'cases', 'consultation','documents','value']));
        }elseif($consultation->type=="otherCourt"){
            $value="अन्य अदालत";
            $documents=Document::where('consultations_id',$consultation->id)->where('type',$value)->get();
            return view('document.index', compact(['document', 'cases', 'consultation','documents','value']));
        }
        elseif($consultation->type=="localLevel"){
            $value="स्थानीय तह";
            $documents=Document::where('consultations_id',$consultation->id)->where('type',$value)->get();
            return view('document.index', compact(['document', 'cases', 'consultation','documents','value']));
        }elseif($consultation->type=="decision"){
            $value="निर्णय भइसकेको";
            $documents=Document::where('consultations_id',$consultation->id)->where('type',$value)->get();
            return view('document.index', compact(['document', 'cases', 'consultation','documents','value']));
        }
        elseif($consultation->type=="rejected"){
            $value="अस्वीकार गरिएको";
            $documents=Document::where('consultations_id',$consultation->id)->where('type',$value)->get();
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
