<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
    //  * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $jobs = Job::latest()->filter(request(['tag','search']))->simplePaginate(4);
        return view('jobs.index',['jobs'=>$jobs]);

    }

    /**
     * Show the form for creating a new resource.
     *
    //  * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(request());
        $add_job = $request->validate([
            'job_title'=>'required|string',
            'tags'=>'required',
            'company'=>'required',
            'email'=>['required',Rule::unique('jobs','email')],
            'location'=>'required',
            'company_site'=>['required',Rule::unique('jobs','company_site')],
            'description'=>'required'
        ]);
        $add_job['user_id'] = auth()->id();
        if($request->has('logo')){
            $add_job['logo'] = $request->file('logo')->store('logos', 'public');
        }
        Job::create($add_job);
        return redirect('/')->with('message', 'job added successfully');
        

    }
public function manage(Request $request)
{
    $id=auth()->user()->id;
    $all_jobs=Job::where('user_id',$id)->get();
        dd($all_jobs);
}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
    //  * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::find($id);
        // dd($job);
        return view('jobs.show', ['job' => $job]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
    //  * @return \Illuminate\Http\Response
     */
    // when use model binding the parameter name should be the same name in route
    public function edit(Job $job)
    {
        
        // dd($job->company);
        return view('jobs.edit', ['job' => $job]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
    //  * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Job  $job)
    {
        $update_job = $request->validate([
            'job_title'=>'required|string',
            'tags'=>'required',
            'company'=>'required',
            'email'=>['required','email','unique:jobs,email'],
            'location'=>'required',
            'company_site'=>['required'],
            'description'=>'required'
        ]);
        if($request->has('logo')){
            $update_job['logo'] = $request->file('logo')->store('logos', 'public');
        }
        // dd($update_job);
        $job->update($update_job);
        return back()->with('message', 'job update ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect('/')->with('message', 'Job Deleted.');
    }
}
