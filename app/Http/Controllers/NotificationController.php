<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;


class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::all();
        return view('notifications.index', compact('notifications'));
    }

    public function create()
    {
        return view('notifications.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'employe_id' => 'required|exists:employe,id',
            'message' => 'required|text',
            'date_envoie' => 'required|date',
            'type' => 'required|string',
        ]);

        Notification::create($validatedData);

        return redirect()->route('notifications.index');
    }

    public function show(Notification $notification)
    {
        return view('notifications.show', compact('notification'));
    }

    public function edit(Notification $notification)
    {
        return view('notifications.edit', compact('notification'));
    }

    public function update(Request $request, Notification $notification)
    {
        $validatedData = $request->validate([
            'employe_id' => 'required|exists:employe,id',
            'message' => 'required|text',
            'date_envoie' => 'required|date',
            'type' => 'required|string',
        ]);

        $notification->update($validatedData);

        return redirect()->route('notifications.index');
    }

    public function destroy(Notification $notification)
    {
        $notification->delete();

        return redirect()->route('notifications.index');
    }
}
