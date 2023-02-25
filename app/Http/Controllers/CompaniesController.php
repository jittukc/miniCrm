<?php

namespace App\Http\Controllers;
use App\Models\Company;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    

    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10); // set default value to 10
        $companies = Company::paginate($perPage);
        return view('companies.index', compact('companies'));
    }
    
    public function create()
    {
        return view('companies.create');
    }
    
    public function store(Request $request)
    {
        // print_r($request);die();
        $request->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
            'website' => 'nullable'
        ]);
   
        $logoName = null;
        if($request->hasFile('logo')){
            $logo = $request->file('logo');
            $logoName = time().'.'.$logo->getClientOriginalExtension();
            $destinationPath = storage_path('app/public');
            $logo->move($destinationPath, $logoName);
        }
    
        $company = new Company([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'logo' => $logoName,
            'website' => $request->get('website')
        ]);
        $company->save();
    
        return redirect('/companies')->with('success', 'Company has been added successfully');
    }
    
    public function show($id)
    {
        $company = Company::find($id);
        return view('companies.show', compact('company'));
    }
    
    public function edit($id)
    {
        $company = Company::find($id);
        return view('companies.edit', compact('company'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
            'website' => 'nullable'
        ]);
    
        $logoName = null;
        if($request->hasFile('logo')){
            $logo = $request->file('logo');
            $logoName = time().'.'.$logo->getClientOriginalExtension();
            $destinationPath = storage_path('app/public');
            $logo->move($destinationPath, $logoName);
        }
    
        $company = Company::find($id);
        $company->name = $request->get('name');
        $company->email = $request->get('email');
        if($logoName){
            $company->logo = $logoName;
        }
        $company->website = $request->get('website');
        $company->save();
    
        return redirect('/companies')->with('success', 'Company has been updated successfully');
    }
    
    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();
        return redirect('/companies')->with('success', 'Company has been deleted successfully');
    }
    
}
