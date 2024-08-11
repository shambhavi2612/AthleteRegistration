<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Athlete;

class AthleteController extends Controller
{
    public function showForm()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:athletes,email',
            'phone' => 'required|string|max:15',
            'preferred_sport' => 'required|string|max:255',
        ]);

        $athlete = Athlete::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'preferred_sport' => $request->preferred_sport,
        ]);

        return redirect()->route('athlete.profile', ['id' => $athlete->id])
                         ->with('success', 'Congratulations!! for Successful Registration');
    }

    public function showProfile($id)
    {
        $athlete = Athlete::findOrFail($id);
        return view('profile', compact('athlete'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:athletes,email,' . $id,
            'phone' => 'required|string|max:15',
            'preferred_sport' => 'required|string|max:255',
        ]);

        $athlete = Athlete::findOrFail($id);
        $athlete->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'preferred_sport' => $request->preferred_sport,
        ]);

        return redirect()->route('athlete.profile', ['id' => $athlete->id])
                         ->with('success', 'Profile updated successfully!');
    }
}
