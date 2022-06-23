<?php

namespace App\Http\Controllers;

use App\Cases;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index(Cases $cases)
    {
        $allCases = Cases::with('partyDetail')->with('oppositParty')->with('informToParty')->with('caseType')->whereMonth('created_at', date('m'))
        ->whereYear('created_at', date('Y'))->paginate(10);
        // return json_decode($allCases);
        // return $allCases;
        return view('cases.manage', compact(['allCases','cases']));
    }

}
