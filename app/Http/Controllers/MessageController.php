<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;


class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::all();
        return view('messages.index', ['messages' => $messages]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'content' => 'required|string',
    ]);
    $validated['sender_id'] = auth()->id();
    $validated['receiver_id'] = $request->route('receiver'); // or from dropdown in form
    Message::create($validated);
    return redirect()->route('messages.index')->with('success', 'Message sent');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $message = Message::findOrFail($id);
        return view('messages.show', ['messages' => $message]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $message = Message::findOrFail($id);
        return view('messages.edit', ['messages' => $message]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
        'content' => 'required|string',
    ]);
    $message = Message::findOrFail($id);
    $message->update($validated);
    return redirect()->route('messages.index')->with('success', 'Message updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $message = Message::findOrFail($id);
        $message->delete();
        return redirect()->route('messages.index')->with('success', 'Message deleted');
    }
}
