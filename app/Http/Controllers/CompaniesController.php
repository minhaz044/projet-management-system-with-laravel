<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $companies=Company::where('user_id',Auth::id())->get();
        return view('companies.index',['companies'=>$companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(Auth::check()){
            $create=company::create([
                    'name'=>$request->input('company_name'),
                    'description'=>$request->input('company_description'),
                    'user_id'=>Auth::id()

            ]);

            if($create){
                return redirect()->route('companies.show',['company'=>$create->id])
                ->with('success','Company created Successfully');
            }

        }
        return back()->withInput()->with('errors','Failed to create Company.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
        $company::find($company->id);

        return view('companies.show',['company'=>$company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        
        $company::find($company->id);
        return view('companies.update',['company'=>$company]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        
        $update=company::where('id',$company->id)->
                update([
                    'name'=>$request->input('company_name'),
                    'description'=>$request->input('company_description')

                ]);
                if($update){
                    return redirect()->route('companies.show',['company'=>$company->id])
                    ->with('success','Company Updated Sucessfully');
                }

                return back()->withInput();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //

        $findCompany=company::find($company->id);
        $deteleCompany=$findCompany->delete();

        if($deteleCompany){
            return redirect()->route('companies.index')->with('success','Company Deleted Sucessfully');
        }
        return back()->withInput()->with('errors','Company Could Not Be Deleted');

    }
}
