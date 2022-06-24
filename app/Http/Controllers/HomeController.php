<?php

namespace App\Http\Controllers;

use App\Cases;
use App\Organization;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $nagrita=Cases::WhereHas('caseType', function ($q) {
            $q->where('case_type',"नागरिकता");
        })->count();

        $byaktigatGhatna=Cases::WhereHas('caseType', function ($q) {
            $q->where('case_type',"व्यक्तिगत घटना");
        })->count();

        $manabBechbikhan=Cases::WhereHas('caseType', function ($q) {
            $q->where('case_type',"मानव बेचबिखन");
        })->count();

        $yonjanyeHinsa=Cases::WhereHas('caseType', function ($q) {
            $q->where('case_type',"यौनजन्य हिंसा");
        })->count();

        $laingikHinsa=Cases::WhereHas('caseType', function ($q) {
            $q->where('case_type',"लैंगिक हिंसा");
        })->count();

        $gharelu=Cases::WhereHas('caseType', function ($q) {
            $q->where('case_type',"घरेलु हिंसा");
        })->count();

        $sampati=Cases::WhereHas('caseType', function ($q) {
            $q->where('case_type',"सम्पत्ति");
        })->count();

        $rit=Cases::WhereHas('caseType', function ($q) {
            $q->where('case_type',"रिट");
        })->count();

        $sambandh=Cases::WhereHas('caseType', function ($q) {
            $q->where('case_type',"सम्बन्ध विच्छेद");
        })->count();

        $punarablokan=Cases::WhereHas('caseType', function ($q) {
            $q->where('case_type',"न्यायिक पुनरावलोकन");
        })->count();

        $other=Cases::WhereHas('caseType', function ($q) {
            $q->where('case_type',"अन्य");
        })->count();

        $datas= $data=[
            '0'=>$nagrita,
            '1'=>$byaktigatGhatna,
            '2'=>$manabBechbikhan,
            '3'=>$yonjanyeHinsa,
            '4'=>$laingikHinsa,
            '5'=>$gharelu,
            '6'=>$sampati,
            '7'=>$sampati,
            '8'=>$rit,
            '9'=>$sambandh,
            '10'=>$punarablokan,
            '11'=>$other
        ];
        $casesInThisMonth=Cases::whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->get();
        $totalCases=Cases::get();
        $title = 'Dashboard';

        $onlineFormsCount = 10;
        $unverifiedOrganizationsCount = 5;
        $registeredOrganizationsCount = 8;
        $closedOrganizationsCount = 2;

        $totalUsersCount = User::count();


        return view('home', [
            'title' => $title,
            'onlineFormsCount' => $onlineFormsCount,
            'unverifiedOrganizationsCount' => $unverifiedOrganizationsCount,
            'registeredOrganizationsCount' => $registeredOrganizationsCount,
            'closedOrganizationsCount' => $closedOrganizationsCount,
            'totalUsersCount' => $totalUsersCount,
            
        ],compact(['totalCases','casesInThisMonth','datas']));
    }
}
