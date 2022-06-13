<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganizationRequest;
use App\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function index()
    {
        $organizations = Organization::latest()->get();
        return view('organization.index', [
            'organizations' => $organizations
        ]);
    }

    public function create()
    {
        return view('organization.form', [
            'organization' => new Organization
        ]);
    }

    public function store(Request $request)
    {
        // return $request;
        $organization=$request->validate([
            'name'=>"required",
            'type'=>"required",
            'district'=>"nullable",
            'address'=>"nullable",
            'phone'=>"nullable",
            'email'=>"nullable",
            'fax'=>"nullable",
        ]);
        Organization::create($organization);
        // $organization = ::create($request->validated([]));
        return redirect()->back()->with('success', 'New organization as been added.');
    }

    public function edit(Organization $organization)
    {
        return view('organization.form', [
            'organization' => $organization
        ]);
    }
    public function update(Request $request, Organization $organization)
    {
        // $organization=;
        $organization->update($request->validate([
            'name'=>"required",
            'type'=>"required",
            'district'=>"nullable",
            'address'=>"nullable",
            'phone'=>"nullable",
            'email'=>"nullable",
            'fax'=>"nullable",
        ]));
        return redirect()->route('organization.index')->with('success', 'organization has been Updated.');
    }

    public function destroy(Organization $organization)
    {
        $organization->delete();
        return redirect()->back()->with('success', 'Organization has been removed.');
    }

}
