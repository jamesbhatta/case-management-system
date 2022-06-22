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
            
        ],compact(['totalCases','casesInThisMonth']));
    }
}
