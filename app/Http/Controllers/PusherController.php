<?php

namespace App\Http\Controllers;

use App\Events\MessageDeletedEvent;
use App\Events\PusherBroadcast;
use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;

class PusherController extends Controller
{
    public function index()
    {
        $currentUserId = auth()->id();
    $messages = Message::where('user_id', $currentUserId)->get();

    // Return the view with the messages
    return view('index', ['messages' => $messages]);
    }

    public function broadcast(Request $request)
    {
        // Validate the request data as needed.
        $this->validate($request, [
            'message' => 'required|string',
        ]);
        // $conversationId = $request->input('conversation_id'); // Replace with your actual input field name
        // $senderUserId = auth()->id();
        // $recipientUserId = $request->input('recipient_id'); // Replace with your actual input field name
        // $messageContent = $request->input('message');
    
        // // Create a new Message model and save it to the database.
        // $message = new Message();
        // $message->conversation_id = $conversationId;
        // $message->sender_id = $senderUserId;
        // $message->recipient_id = $recipientUserId;
        // $message->message = $messageContent;
        // $message->user_id = auth()->id(); 
        // $message->message = $request->input('message');
        // $message->save();

        // Create a new Message model and save it to the database.
        $message = new Message();
        $message->user_id = auth()->id(); // Assuming you're storing the user ID who sent the message.
        $message->message = $request->input('message');
        $message->save();

        // Broadcast the message to other users.
        broadcast(new PusherBroadcast($request->input('message')))->toOthers();

        // Return a response indicating the message was saved.
        return view('broadcast', ['message' => $request->get('message')]);
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

public function destroy(Message $message)
{
    
    $message->delete();

    return redirect()->route('pusher.index')->with('success', 'Message supprimé avec succès.');
}
}
