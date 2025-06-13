<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $rooms = Room::when($search, function ($query, $search) {
            return $query->where('room_name', 'like', "%{$search}%")
                        ->orWhere('specialty', 'like', "%{$search}%");
        })->paginate(10);
        return view('rooms.index', compact('rooms', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'room_name' => 'required|string|max:100',
            'specialty' => 'required|string|max:100',
        ]);

        Room::create($request->all());
        return redirect()->route('rooms.index')->with('success', 'Phòng đã được thêm.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        return view('rooms.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        return view('rooms.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        $request->validate([
            'room_name' => 'required|string|max:100',
            'specialty' => 'required|string|max:100',
        ]);

        $room->update($request->all());
        return redirect()->route('rooms.index')->with('success', 'Phòng đã được cập nhật.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('rooms.index')->with('success', 'Phòng đã được xóa.');
    }
}
