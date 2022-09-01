<?php

namespace App\Http\Controllers;

use App\Cases;
use App\CaseType;
use Illuminate\Http\Request;

class CaseTypeController extends Controller
{
    public function index(Cases $cases)
    {
        $caseTypes = CaseType::where('cases_id',$cases->id)->get();
        return view('cases.case_type.list', compact(['cases', 'caseTypes']));
    }

    public function create(Cases $cases, CaseType $caseType)
    {
        return view('cases.case_type.index', compact(['cases', 'caseType']));
    }

    public function store(Request $request)
    {
        CaseType::create($request->validate([
            'cases_id' => 'required',
            'case_type' => "required",
            'personal_event'=>"nullable",
        ]));
        $cases = Cases::where('id', $request->cases_id)->get()[0];

        return redirect()->route('case-type.index', $cases)->with('success', "मुद्दाको किसिम सफलतापूर्वक थपियो");
    }

    public function edit(CaseType $caseType)
    {
        $cases = CaseType::where('cases_id', $caseType->cases_id)->get()[0];
       
        return view('cases.case_type.index', compact(['cases', 'caseType']));
    }
    
    public function update(Request $request, CaseType $caseType)
    {
        $caseType->update($request->validate([
            'case_type' => "required",
            'personal_event'=>"nullable",
        ]));
        $cases = Cases::where('id', $caseType->cases_id)->get()[0];

        return redirect()->route('case-type.index', $cases)->with('success', "मुद्दाको किसिम सफलतापूर्वक परिवर्तन");
    }

    public function destroy(CaseType $caseType)
    {
        $caseType->delete();
        return redirect()->back()->with('success', "मुद्दाको किसिम सफलतापूर्वक हटाइयो");
    }
}
