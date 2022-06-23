<?php

namespace App\Http\Controllers;

use App\Cases;
use App\District;
use App\Municipality;
use App\PersonalDetail;
use App\Versp;
use Illuminate\Http\Request;

class PersonalDetailController extends Controller
{
    public function index(Versp $versp,PersonalDetail $personalDetail)
    {
       
        $versps=Versp::get();
        $personalDetails=PersonalDetail::where('versp_id',$versp->id)-> get();
        // return $personalDetails;
        return view('versp.personal_detail.list',compact(['versp','personalDetails','personalDetail']));
    }
    public function create(Versp $versp, PersonalDetail $personalDetail)
    {
        $districts=District::get();
        $municipalities=Municipality::get();
        
        return view('versp.personal_detail.index',compact(['versp','personalDetail','districts','municipalities']));
    }

    public function store(Request $request)
    {
        $data=$request->validate([
            'versp_id'=>"required",
            'first_name'=>"required",
            'middle_name'=>"nullable",
            'last_name'=>"required",
            'dob'=>"required",
            'age'=>"required",
            'gender'=>"required",
            'marrige_status'=>"required",
            'district'=>"required",
            'municipality'=>"required",
            'ward'=>"required",
            'contact'=>"required",
            'email'=>"nullable",
            'cast'=>"required",
            'religion'=>"required",
            'education'=>"required",
            'disability_status'=>"required",
            'family_number'=>"required",
            'disable_family_number'=>"required",
        ]);
        PersonalDetail::create($data);
        $versp=Versp::where('id',$request->versp_id)->get()[0];
        
        return redirect()->route('personal-detail.index',$versp)->with('success',"Added");
            
      
    }

    public function edit(PersonalDetail $personalDetail)
    {
        $versp=Versp::where('id',$personalDetail->versp_id)->get()[0];
        
        $personalDetails=PersonalDetail::get();
        // return $personalDetails;
        $districts=District::get();
        $municipalities=Municipality::get();
        
        return view('versp.personal_detail.index',compact(['versp','personalDetail','districts','municipalities']));
    }

    public function update(Request $request, PersonalDetail $personalDetail)
    {
        $personalDetail->update($request->validate([
            
            'first_name'=>"required",
            'middle_name'=>"nullable",
            'last_name'=>"required",
            'dob'=>"required",
            'age'=>"required",
            'gender'=>"required",
            'marrige_status'=>"required",
            'district'=>"required",
            'municipality'=>"required",
            'ward'=>"required",
            'contact'=>"required",
            'email'=>"nullable",
            'cast'=>"required",
            'religion'=>"required",
            'education'=>"required",
            'disability_status'=>"required",
            'family_number'=>"required",
            'disable_family_number'=>"required",
        ]));

        $versp=Versp::where('id',$request->versp_id)->get()[0];
        
        return redirect()->route('personal-detail.index',$versp)->with('success',"Updated");
    }

    public function destroy(PersonalDetail $personalDetail)
    {
        $personalDetail->delete();
        return redirect()->back()->with('success',"Deleted");
    }
}
