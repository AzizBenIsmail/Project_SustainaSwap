<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AdminChat;
use Illuminate\Http\Request;

class AdminChatController extends Controller
{
    public function create()
{
    return view('adminChat.create');
}

public function store(Request $request)
{
    // Validate the request
    $request->validate([
        'content' => 'required|string',
    ]);

    // Create a new message
    $message = new AdminChat();
    $message->name = auth()->user()->name; // Get the name from the authenticated user
    // $message->name = $request->input('name');
    $message->content = $request->input('content');
    $message->user_id = auth()->id();
    $message->save();

    return redirect()->route('adminChat.store')->with('success', 'Message sent successfully!');
}

public function index()
{
    $messages = AdminChat::all();
    return view('adminChat.index', ['messages' => $messages]);
}
public function edit($id)
{
    $message = AdminChat::find($id);
    return view('adminChat.edit', ['message' => $message]);
}

public function update(Request $request, $id)
{
    // Validate the request
    $request->validate([
        'content' => 'required|string',
    ]);

    // Update the message
    $message = AdminChat::find($id);
    $message->content = $request->input('content');
    $message->save();

    return redirect()->route('adminChat.index')->with('success', 'Message updated successfully!');
}
public function destroy($id)
{
    $message = AdminChat::find($id);
    $message->delete();

    return redirect()->route('adminChat.index')->with('success', 'Message deleted successfully!');
}

}
