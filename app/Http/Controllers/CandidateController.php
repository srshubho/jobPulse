<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Candidate;
use App\Models\Education;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;


class CandidateController extends Controller
{
    public function index()
    {
        return view('dashboard.candidate.index');
    }

    public function register()
    {
        return view('auth.candidate.register');
    }

    public function store(Request $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->user_type = 'candidate';
            $user->save();
            DB::table('candidates')->insert([
                'user_id' => $user->id,
            ]);

            event(new Registered($user));

            Auth::login($user);
            DB::commit();
            return redirect('/candidates/login');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }


    }
    public function login(Request $request)
    {
        return view('auth.candidate.login');
    }

    public function loginCheck(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);
        $credentials['user_type'] = 'candidate';
        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->intended('candidates/dashboard');
        }

        return back()->with('error', 'The provided credentials do not match our records.');
    }

    public function profile()
    {
        $candidate = Candidate::where('user_id', Auth::user()->id)->with('experiences', 'educations')->first();
        return view('dashboard.candidate.profile', compact('candidate'));
    }

    public function updateProfile(Request $request)
    {
        // dd(strlen($request->phone));
        $request->validate([
            'full_name' => 'required|max:255',
            'father_name' => 'max:255',
            'mother_name' => 'max:255',
            'phone' => 'required|digits:11|numeric|unique:candidates,phone',
            'emergency_contact' => 'required|digits:11|numeric',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female',
            'summary' => 'max:1000',
            'website' => 'url:https,http',


        ]);
        $candidate = Candidate::where('user_id', Auth::user()->id)->first();
        $candidate->full_name = $request->full_name;
        $candidate->father_name = $request->father_name;
        $candidate->mother_name = $request->mother_name;
        $candidate->phone = $request->phone;
        $candidate->emergency_contact = $request->emergency_contact;
        $candidate->date_of_birth = $request->date_of_birth;
        $candidate->gender = $request->gender;
        $candidate->summary = $request->summary;
        $candidate->website = $request->website;
        $candidate->skills = $request->skills;
        $candidate->blood_group = $request->blood_group;
        $candidate->present_address = $request->present_address;
        $candidate->save();
        return redirect()->back();
    }

    public function storeEducation(Request $request)
    {
        $request->validate([
            'degree' => 'required',
            'institution' => 'required',
            'year' => 'required|numeric|digits:4',
            'result' => 'required|numeric|min:2.00|max:5.00',
            'department' => 'required',
        ]);
        $candidate = Candidate::where('user_id', Auth::user()->id)->first();
        $education = new Education();
        $education->degree = $request->degree;
        $education->institution = $request->institution;
        $education->year = $request->year;
        $education->result = $request->result;
        $education->department = $request->department;
        $education->candidate_id = $candidate->id;
        $candidate->educations()->save($education);
        return redirect()->back()->with('success', 'Education added successfully');
    }

    public function storeExperience(Request $request)
    {
        $request->validate([
            'company' => 'required',
            'designation' => 'required',
            'joining_date' => 'required|date',
            'departure_date' => 'required|date',

        ]);
        $candidate = Candidate::where('user_id', Auth::user()->id)->first();
        $experience = new Experience();
        $experience->company = $request->company;
        $experience->designation = $request->designation;
        $experience->joining_date = $request->joining_date;
        $experience->departure_date = $request->departure_date;
        $candidate->experience()->save($experience);
        return redirect()->back()->with('success', 'Experience added successfully');
    }

    public function updateEducation(Request $request, Education $education)
    {
        $request->validate([
            'degree' => 'required',
            'institution' => 'required',
            'year' => 'required|numeric|digits:4',
            'result' => 'required|numeric|min:2.00|max:5.00',
            'department' => 'required',
        ]);
        $education = Education::where('id', $education->id)->first();
        $education->degree = $request->degree;
        $education->institution = $request->institution;
        $education->year = $request->year;
        $education->result = $request->result;
        $education->department = $request->department;
        $education->save();
        return redirect()->back()->with('success', 'Education updated successfully');
    }

    public function destroyEducation(Education $education)
    {
        $education->delete();
        return redirect()->back()->with('success', 'Education deleted successfully');
    }
}
