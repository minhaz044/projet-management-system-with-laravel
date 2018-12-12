<?php

namespace App\Http\Controllers;

use App\Project;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $projects=Project::where('user_id',Auth::id())->get();
        return view('projects.index',['projects'=>$projects]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id=null)
    {
        //


        $companies=NULL;
        if(!$id){

            $companies=company::where('user_id',Auth::id())->get();
        }
        return view('projects.create',['company'=>$id,'companies'=>$companies]);
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
            $create=Project::create([
                    'name'=>$request->input('project_name'),
                    'description'=>$request->input('project_description'),
                    'days'=>$request->input('project_days'),
                    'user_id'=>Auth::id(),
                    'company_id'=>$request->input('company_id')


            ]);

            if($create){
                return redirect()->route('projects.show',['project'=>$create])
                ->with('success','Project created Successfully');
            }

        }
        return back()->withInput()->with('errors','Failed to create Project.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
        $project::find($project->id);

        return view('projects.show',['project'=>$project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        
        $project::find($project->id);
        return view('projects.update',['project'=>$project]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        
        $update=project::where('id',$project->id)->
                update([
                    'name'=>$request->input('project_name'),
                    'description'=>$request->input('project_description')

                ]);
                if($update){
                    return redirect()->route('companies.show',['project'=>$project->id])
                    ->with('success','Project Updated Sucessfully');
                }

                return back()->withInput();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //

        $findproject=Project::find($project->id);
        $deteleproject=$findproject->delete();

        if($deteleproject){
            return redirect()->route('companies.index')->with('success','Project Deleted Sucessfully');
        }
        return back()->withInput()->with('errors','Project Could Not Be Deleted');

    }
}
