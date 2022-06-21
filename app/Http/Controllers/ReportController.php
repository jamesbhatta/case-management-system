<?php

namespace App\Http\Controllers;

use App\Cases;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Cases $cases)
    {
        $allCases = Cases::with('partyDetail')->with('oppositParty')->with('informToParty')->with('caseType')->get();
        // return json_decode($allCases);
        // return $allCases;
        return view('report.index', compact(['allCases','cases']));
    }
}
