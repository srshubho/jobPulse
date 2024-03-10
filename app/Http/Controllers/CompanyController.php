<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\Auth\LoginRequest;

class CompanyController extends Controller
{

    public function index()
    {
        return view('dashboard.company.index');
    }

    public function register()
    {
        return view('auth.company.register');
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
            $user->user_type = 'company';
            $user->save();
            DB::table('companies')->insert([
                'user_id' => $user->id,
            ]);

            event(new Registered($user));

            Auth::login($user);
            DB::commit();
            return redirect('/companies/login');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }


    }
    public function login(Request $request)
    {
        return view('auth.company.login');
    }

    public function loginCheck(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);
        $credentials['user_type'] = 'company';
        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->intended('companies/dashboard');
        }

        return back()->with('error', 'The provided credentials do not match our records.');
    }

}
