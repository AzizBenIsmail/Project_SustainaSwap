<?php

namespace App\Http\Controllers;

use App\Events\MessageDeletedEvent;
use App\Events\PusherBroadcast;
use App\Http\Controllers\Controller;
use App\Models\AdminChat;
use App\Models\Conversation;
use App\Models\Item;
use App\Models\Message;
use App\Models\MsgAdmin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PusherController extends Controller
{
    public function indexAdmin()
    {
        $messages = AdminChat::all();
        return view('chatAdmin', compact('messages'));
    }


    
    public function chatAdminSend(Request $request)
    {      
        // Validate the request data if needed
    $request->validate([
        'content' => 'required|string',
    ]);
    $message = new MsgAdmin();
    $message->content = $request->input('content');
    $message->save();

    // Pass the message content to the JavaScript function
    $messageContent = $request->input('content');
    echo '<script>';
    echo "showAdminMessageNotification('$messageContent');";
    echo '</script>';
    // Optionally, you can flash a success message to the session
    session()->flash('success', 'Message sent successfully!');

    // Redirect back to the previous page or any other view
    return redirect()->back();
    }
    
/**
     * Display the specified resource.
     *
     * @param \App\Models\Item $item
     * @return \Illuminate\Http\Response
     */
//     public function index($Id)
// {
// //    dd($item->name);
//     $currentUserId = auth()->id();
//     $item = Item::find($Id);
//     //     $recipientId = $item->user_id;

//     $messages = Message::where('user_id', $currentUserId)->get();
//     return view('index', ['messages' => $messages, 'item' => $item]);
// }

public function index($Id)
{
    $currentUserId = auth()->id();
    $item = Item::find($Id);
    $recipientId = $item->user_id;

    // Retrieve messages sent by the current user (sender)
    $senderMessages = Message::where('user_id', $currentUserId)
                            ->where('recipient_id', $recipientId)
                            ->orderBy('created_at', 'asc')
                            ->get();

    // Retrieve messages sent by the recipient
    $recipientMessages = Message::where('user_id', $recipientId)
                               ->where('recipient_id', $currentUserId)
                               ->orderBy('created_at', 'asc')
                               ->get();

    // Merge and sort both sets of messages based on the created_at timestamp
    $messages = $senderMessages->merge($recipientMessages)
                 ->sortBy('created_at')
                 ->values();

    $recipient = User::find($recipientId);
    // return view('index', ['messages' => $messages, 'item' => $item]);
    return view('index', compact('recipient', 'messages', 'item'));
}










    public function broadcast(Request $request)
    {
        // Validate the request data as needed.
        // $this->validate($request, [
        //     'message' => 'required|string'
        //     // 'message_id'=>'required|string'
        // ]);
        // $conversationId = $request->input('conversation_id'); // Replace with your actual input field name
        // $senderUserId = auth()->id();
        // $recipientUserId = $request->input('recipient_id'); // Replace with your actual input field name
        // $messageContent = $request->input('message');

      

        // Create a new Message model and save it to the database.
        $message = new Message();
        $message->user_id = auth()->id(); // Assuming you're storing the user ID who sent the message.
        $message->message = $request->input('message');
        $message->name = auth()->user()->name;
        $message->recipient_id= $request->input('recipient');
        $message->save();
        $messageId = $message->id;
        // Broadcast the message to other users.
        broadcast(new PusherBroadcast($request->input('message')))->toOthers();

        // Return a response indicating the message was saved.
        return view('broadcast', ['message' => $request->get('message'),'messageId' => $messageId]);
    }


    public function receive(Request $request)
    {
        return view('receive', ['message' => $request->get('message')]);
    }
//     public function showConversation($conversationId)
// {
//     // Retrieve the conversation based on the conversation ID
//     $conversation = Conversation::find($conversationId);

//     if (!$conversation) {
//         // Handle the case where the conversation doesn't exist
//         // You can return an error response or redirect to an error page
//     }

//     // Retrieve the messages associated with this conversation
//     $messages = $conversation->messages;

//     // Pass the conversation and messages to the view
//     return view('conversation.show', ['conversation' => $conversation, 'messages' => $messages]);
// }


public function deleteMessage(Request $request)
{
    try {
        $messageId = $request->input('message_id');

        $message = Message::where('id', $messageId)
            ->where('user_id', auth()->id())
            ->first();

        if ($message) {
            $message->delete();

            return response()->json(['success' => true, 'msg' => 'Message Deleted Successfully!']);
        } else {
            return response()->json(['success' => false, 'msg' => 'Message not found or you do not have permission to delete it.']);
        }
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'msg' => $e->getMessage()]);
    }
}

public function destroy($id) {
    // Retrieve the message by ID and delete it
    $message = Message::find($id);
    if ($message) {
        $message->delete();
    }


    return redirect()->route('pusher.index')->with('success', 'Message supprimé avec succès.');
}

public function delete($id) {
    // Retrieve the message by ID and delete it
    $message = Message::find($id);
    if ($message) {
        $message->delete();
    }

    // Redirect back to the page, or to a specific URL
    return redirect()->back();
}

}
