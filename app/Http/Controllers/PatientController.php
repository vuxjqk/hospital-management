<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $patients = Patient::when($search, function ($query, $search) {
            return $query->where('full_name', 'like', "%{$search}%")
                        ->orWhere('id_card', 'like', "%{$search}%");
        })->paginate(10);
        return view('patients.index', compact('patients', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:100',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string|in:Nam,Nữ,Khác',
            'address' => 'required|string',
            'id_card' => 'required|string|max:20',
        ]);

        Patient::create($request->all());
        return redirect()->route('patients.index')->with('success', 'Bệnh nhân đã được thêm.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'full_name' => 'required|string|max:100',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string|in:Nam,Nữ,Khác',
            'address' => 'required|string',
            'id_card' => 'required|string|max:20',
        ]);

        $patient->update($request->all());
        return redirect()->route('patients.index')->with('success', 'Bệnh nhân đã được cập nhật.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Bệnh nhân đã được xóa.');
    }
}
