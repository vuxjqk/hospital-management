<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|int',
            'room_id'    => 'required|int',
            'status'     => 'nullable|string',
        ]);

        $today = now()->toDateString();

        $countToday = Appointment::whereDate('created_at', $today)
                        ->where('room_id', $validated['room_id'])
                        ->count();

        $validated['number'] = $countToday + 1;

        $appointment = Appointment::create($validated);

        return redirect()->route('appointments.show', $appointment->id)
            ->with('success', 'Lịch hẹn đã được thêm.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        return view('appointments.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
