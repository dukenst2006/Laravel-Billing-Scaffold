<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests;
use App\Http\Requests\CompanyRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{

    public function index()
    {	
        $company = Auth::user()->company;
    	return view('dashboard.company.index', compact(['company']));
    }

    public function create()
    {
        $company = Auth::user()->company;
    	if ( $company ) {
    		flash('You already have a Company. Try editing your company.', 'warning');
    		return redirect()->back();
    	}
    	
    	return view('dashboard.company.create');
    }

    public function store(CompanyRequest $request)
    {
        $current_time = Carbon::now()->toDateString();
        $companyName = $this->replace_dashes($request->name);
        
    	$company = new Company;
        $company->name = $request->name;
        $company->address = $request->address;
        $company->address2 = $request->address2;
        $company->city = $request->city;
        $company->state = $request->state;
        $company->zip = $request->zip;
        if ( $request->logo ) { 
            $file = $request->logo;
            $extension = $file->getClientOriginalExtension();
            Storage::disk('local')->put(
                    'company-logos/'.$companyName.'-logo'.$current_time.'.'.$extension, 
                    file_get_contents($request->file('logo')->getRealPath())
            );
            $company->logo = $companyName.'-logo'.$current_time.'.'.$extension;
        }    
        $company->url = $request->url;
        $company->main_phone = $request->main_phone;
        $company->save();

        Auth::user()->company()->associate($company)->save();
        
        flash('You created your company! You can now add more users or start projects!','success');
        return redirect()->route('company.index');
    }

    public function edit($id)
    {
        $company = Auth::user()->company;
        if ( $id == $company->id ) {
            return view('dashboard.company.edit', compact('company'));
        }   
        flash('Sorry, you don\'t have access to that company.', 'danger');
        return redirect()->route('company.index');
    }

    public function update(CompanyRequest $request, $id)
    {
        $current_time = Carbon::now()->toDateString();

        $company = Company::find($id);
        $companyName = $this->replace_dashes($request->name);
        $company->name = $request->name;
        $company->address = $request->address;
        $company->address2 = $request->address2;
        $company->city = $request->city;
        $company->state = $request->state;
        $company->zip = $request->zip;
        if ( $request->logo ) { 
            $file = $request->logo;
            $extension = $file->getClientOriginalExtension();
            Storage::disk('local')->put(
                    'company-logos/'.$companyName.'-logo'.$current_time.'.'.$extension, 
                    file_get_contents($request->file('logo')->getRealPath())
            );
            $company->logo = $companyName.'-logo'.$current_time.'.'.$extension;
        } else {
            $company->logo = $company->logo; 
        }
        $company->url = $request->url;
        $company->main_phone = $request->main_phone;
        $company->save();

        flash('Company Updated!', 'success');
        return redirect()->route('company.index');
    }

    public function destroy($id)
    {  
       Auth::user()->company()->dissociate()->save();
       Company::find($id)->delete();

       flash('You have deleted your company.', 'success');
       return redirect()->route('company.index');
    }

    public function replace_dashes($string) {
        $removeHtml = strip_tags($string);
        $specialChar = preg_replace("/[^a-zA-Z0-9]/", "", $removeHtml);
        $addDash = str_replace(' ', '-', $specialChar);
        $lowercaseString = strtolower($addDash);     
        return $lowercaseString;
    }

}
