<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\CentreAdmin;
use App\Models\Athlete;

class CentreAdminController extends Controller
{
    
    public function index()
    {
        $centreAdmins = CentreAdmin::all();
        return view('center_admins.index', compact('centreAdmins'));
    }


    public function create()
    {
        return view('center_admins.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:centre_admins',
            'password' => 'required|string|min:8',
        ]);

        CentreAdmin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('center_admins.index')->with('success', 'Centre Admin created successfully.');
    }

    public function showLoginForm()
    {
        return view('center_admins.login');
    }

    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::guard('centre_admin')->attempt($credentials)) {
        return redirect()->intended('center-admins/dashboard'); 
    }

    return redirect()->back()->withErrors(['email' => 'Invalid credentials'])->withInput();
}



    public function logout()
    {
        Auth::guard('centre_admin')->logout();
        return redirect()->route('centre_admins.login')->with('success', 'Logged out successfully.');
    }

    public function dashboard()
    {
        if (Auth::guard('centre_admin')->check()) {
            $athletes = Athlete::all(); // Fetch all athletes
            return view('center_admins.dashboard', compact('athletes'));
        }

        return redirect()->route('centre_admins.login')->withErrors([
            'email' => 'You need to log in to access this page.',
        ]);
    }


    public function edit($id)
    {
        $centreAdmin = CentreAdmin::findOrFail($id);
        return view('center_admins.edit', compact('centreAdmin'));
    }

    public function update(Request $request, $id)
    {
        $centreAdmin = CentreAdmin::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:centre_admins,email,' . $id,
            'password' => 'nullable|string|min:8',
        ]);

        $data = $request->only('name', 'email');
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $centreAdmin->update($data);

        return redirect()->route('center_admins.index')->with('success', 'Centre Admin updated successfully.');
    }

    public function destroy($id)
    {
        $centreAdmin = CentreAdmin::findOrFail($id);
        $centreAdmin->delete();

        return redirect()->route('center_admins.index')->with('success', 'Centre Admin deleted successfully.');
    }
}
