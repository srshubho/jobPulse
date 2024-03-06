<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::where('company_id', auth()->user()->company->id)->get() ?? [];
        return view('dashboard.company.job-list', compact('jobs'));
    }
    public function create()
    {
        $categories = DB::table('job_categories')->get();
        return view('dashboard.company.create-job', compact('categories'));
    }

    public function show(Job $job)
    {
        return view('dashboard.company.job-view', compact('job'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $company_id = auth()->user()->company->id;
        $request->validate([
            'title' => 'required',
            'context' => 'required',
            'workplace' => 'required|in:on-site,remote,hybrid',
            'job_category_id' => 'required|exists:job_categories,id',
            'location' => 'required',
            'deadline' => 'required|date',
            'type' => 'required|in:full-time,part-time,internship,contract',
            'salary' => 'required|numeric',
            'educational_requirement' => 'required',
            'experience_requirement' => 'required',
        ]);
        Job::create([
            'company_id' => $company_id,
            'title' => $request->title,
            'context' => $request->context,
            'workplace' => $request->workplace,
            'job_category_id' => $request->job_category_id,
            'location' => $request->location,
            'deadline' => $request->deadline,
            'type' => $request->type,
            'salary' => $request->salary,
            'educational_requirement' => $request->educational_requirement,
            'experience_requirement' => $request->experience_requirement,
            'additional_requirement' => $request->additional_requirement,
            'benefits' => $request->benefits,
            'skills' => $request->skills,


        ]);
        return redirect('/companies/jobs')->with('success', 'Job created successfully');
    }

    public function edit(Job $job)
    {
        $categories = DB::table('job_categories')->get();
        return view('dashboard.company.edit-job', compact('job', 'categories'));
    }

    public function update(Request $request, Job $job)
    {
        $request->validate([
            'title' => 'required',
            'context' => 'required',
            'workplace' => 'required|in:on-site,remote,hybrid',
            'job_category_id' => 'required|exists:job_categories,id',
            'location' => 'required',
            'deadline' => 'required|date',
            'type' => 'required|in:full-time,part-time,internship,contract',
            'salary' => 'required|numeric',
            'educational_requirement' => 'required',
            'experience_requirement' => 'required',
        ]);
        $job->update([
            'title' => $request->title,
            'context' => $request->context,
            'workplace' => $request->workplace,
            'job_category_id' => $request->job_category_id,
            'location' => $request->location,
            'deadline' => $request->deadline,
            'type' => $request->type,
            'salary' => $request->salary,
            'educational_requirement' => $request->educational_requirement,
            'experience_requirement' => $request->experience_requirement,
            'additional_requirement' => $request->additional_requirement,
            'benefits' => $request->benefits,
            'skills' => $request->skills,

        ]);
        return redirect('/companies/jobs')->with('success', 'Job updated successfully');
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect('/companies/jobs')->with('success', 'Job deleted successfully');
    }
}
