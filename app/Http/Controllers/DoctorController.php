<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Doctor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $doctors = Doctor::when($search, function ($query, $search) {
            return $query->where('full_name', 'like', "%{$search}%");
        })->paginate(10);
        return view('doctors.index', compact('doctors', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rooms = Room::all();
        return view('doctors.create', compact('rooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:100',
            'room_id' => 'required|int',
            'role' => 'required|string',
        ]);

        Doctor::create($request->all());
        return redirect()->route('doctors.index')->with('success', 'Bác sĩ đã được thêm.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        return view('doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        $rooms = Room::all();
        return view('doctors.edit', compact('doctor', 'rooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'full_name' => 'required|string|max:100',
            'room_id' => 'required|int',
            'role' => 'required|string',
        ]);

        $doctor->update($request->all());
        return redirect()->route('doctors.index')->with('success', 'Bác sĩ đã được cập nhật.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('doctors.index')->with('success', 'Bác sĩ đã được xóa.');
    }
}
