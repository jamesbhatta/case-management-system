<?php

namespace App\Http\Controllers;

use App\Cases;
use App\PartyDetail;
use Illuminate\Http\Request;

class CasesController extends Controller
{
    public function index(Cases $cases)
    {
        $allCases = Cases::with('partyDetail')->with('oppositParty')->with('informToParty')->with('caseType')->paginate(10);
        // return json_decode($allCases);
        // return $allCases;
        return view('cases.manage', compact(['allCases','cases']));
    }

    public function store(Request $request)
    {

        Cases::create($request->validate([
            'case_number' => "required",
            'date' => "required",
            'case_status' => "required",
            'case_type'=>'required',
            'inform_to_org'=>"required"
        ]));

        return redirect()->back()->with('success', "मुद्दा सफलतापूर्वक दर्ता भयो");
    }

    public function destroy(Cases $cases)
    {
        $cases->delete();
        return redirect()->back()->with('success', "मुद्दा सफलतापूर्वक हटाइयो");
    }

    public function edit(Cases $cases)
    {
        $allCases = Cases::all();
        return view('cases.index', compact(['allCases', 'cases']));
    }

    public function update(Request $request,Cases $cases)
    {
        $cases->update($request->validate([
            'case_number' => "required",
            'date' => "required",
            'case_status' => "required",
            'case_type'=>'required',
            'inform_to_org'=>"required"
        ]));
        return redirect()->back()->with('success',"मुद्दा सफलतापूर्वक अपडेट भयो");
    }

    public function create(Cases $cases)
    {
        $allCases = Cases::all();
        return view('cases.index', compact(['allCases','cases']));
    }

    public function search(Request $request,Cases $cases)
    {
        
        // $allCases=Cases::with('partyDetail')->with('oppositParty')->with('informToParty')->with('caseType')->where('case_number',$request->case_data)->orWhere('case_status',$request->case_data)->get();
        // return $cases;
        $allCases = Cases::with('partyDetail')->with('oppositParty')->with('informToParty')
        ->with('caseType')
        ->when($request->filled('search'), function ($query) {
            $query->where('case_number', request('search'))
                ->orWhere('case_status', request('search'))
                ->orWhereHas('partyDetail', function ($q) {
                    $q->where('first_name','like','%'. request('search').'%')
                        ->orWhere('last_name','like','%'. request('search').'%');
                })
                ->orWhereHas('oppositParty', function ($q) {
                    $q->where('first_name','like','%'. request('search').'%')
                        ->orWhere('last_name','like','%'. request('search').'%');
                })
                ->orWhereHas('informToParty', function ($q) {
                    $q->where('relation','like','%'. request('search').'%');
                })
                ->orWhereHas('caseType', function ($q) {
                    $q->where('case_type','like','%'. request('search').'%');
                });
                
            // ->orWhere('')
        })
        // ->where('case_number',$request->case_data)
        // ->orWhere('case_status',$request->case_data)
        ->get();
        // return $allCases;
        return view('cases.manage', compact(['allCases','cases']));
    }
    
    public function dateFilter(Request $request,Cases $cases)
    {
        $allCases=Cases::with('partyDetail')->with('oppositParty')->with('informToParty')->with('caseType')->whereBetween('date', [$request->start, $request->end])->get();
        // return $cases;
        return view('cases.manage', compact(['allCases','cases']));
    }
    
}
