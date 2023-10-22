<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Trade;
use App\Models\User;
use App\Models\Item;
use App\Models\Avis;
use App\Events\TradeCreated;
use Twilio\Rest\Client; // Import the Twilio Client

class TradeController extends Controller
{
    public function index()
    {
        // Get the authenticated user
    $userId = auth()->user()->id;

    // Retrieve trades associated with the authenticated user
    $trades = Trade::where('owner_id', $userId )->whereIn('status', ['pending', 'accepted'])->get();

    return view('trades.index', compact('trades'));
    }
    public function index1()
{
    $user= auth()->user(); // Get the authenticated user
    $trades = Trade::whereHas('requestedItem', function ($query) use ($user) {
        $query->where('user_id', $user->id);
    })
    ->whereIn('status', ['pending', 'accepted'])
    ->get();
    //dd($user,$trades);
    return view('trades.index1', compact('trades'));
}

    public function create()
    {
        $items = Item::all();
        return view('trades.create', compact('items'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tradeStartDate' => 'required|date',
            'tradeEndDate' => 'required|date|after:tradeStartDate', // Ensure end date is after start date
        ], [
            'tradeEndDate.after' => 'The end date must be greater than the start date.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $ownerId = auth()->user()->id;
        $requestedItemId = $request->input('item_id');
        $status ='pending';

        $trade = Trade::create([
            'tradeStartDate' => $request->input('tradeStartDate'),
            'tradeEndDate' => $request->input('tradeEndDate'),
            'status' => $status,
            'owner_id' => $ownerId,
            'offered_item_id' => $request->input('offered_item_id'),
            'requested_item_id' => 1,
        ]);
        $message = "Hello, a new trade has been created!\n";
        $message .= "Proposed by: " . $trade->owner->name . "\n";
        $message .= "Offered Item: " . $trade->offeredItem->title . "\n";
        $message .= "For more information, please check the trade details.";

       // $this->sendSms($trade,$message); // Call the sendSms method
        return redirect()->route('trades.index')->with('success', 'Trade created.');;
    }

    public function show($id)
    {
        $trade = Trade::findOrFail($id);

        // Load the associated "Avis" records for the trade
        $trade->load('avis');

        return view('trades.show', compact('trade'));
    }

    public function edit($id)
    {
        $users = User::all();
        $items = Item::all();
        $trade = Trade::findOrFail($id);
        return view('trades.edit', compact('trade', 'users', 'items'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'tradeStartDate' => 'required|date',
            'tradeEndDate' => 'required|date|after:tradeStartDate', // Ensure end date is after start date
        ], [
            'tradeEndDate.after' => 'The end date must be greater than the start date.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $trade = Trade::findOrFail($id);
        $trade->update($request->all());
        return redirect()->route('trades.index')->with('success', 'Trade updated.');;
    }

    public function destroy($id)
    {
        $trade = Trade::findOrFail($id);
        $trade->delete();
        return redirect()->route('trades.index');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $trades = Trade::where(function ($query) use ($search) {
            $query->where('tradeStartDate', 'like', '%' . $search . '%')
                ->orWhere('tradeEndDate', 'like', '%' . $search . '%')
                ->orWhere('status', 'like', '%' . $search . '%');
        })
            ->orWhereHas('owner', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->orWhereHas('offeredItem', function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');
            })
            ->orWhereHas('requestedItem', function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');
            })
            ->get();

        return view('trades.search', compact('trades'));
    }

    public function calendar()
    {
        $userId = auth()->user()->id;

        // Retrieve trades associated with the authenticated user
        $trades = Trade::where('owner_id', $userId )->whereIn('status', ['pending', 'accepted'])->get();

        $events = [];
        foreach ($trades as $trade) {
            $events[] = [
                'title' => $trade->requestedItem->title, // You might want to use a different field here
                'start' => $trade->tradeStartDate,
                'end' => $trade->tradeEndDate,
            ];
        }

        return view('trades.calendar', compact('events'));
    }
    public function calendarr()
    {

        // Retrieve trades associated with the authenticated user
        $user= auth()->user(); // Get the authenticated user
        $trades = Trade::whereHas('requestedItem', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
        ->whereIn('status', ['pending', 'accepted'])
        ->get();

        $events = [];
        foreach ($trades as $trade) {
            $events[] = [
                'title' => $trade->requestedItem->title, // You might want to use a different field here
                'start' => $trade->tradeStartDate,
                'end' => $trade->tradeEndDate,
            ];
        }

        return view('trades.calendarr', compact('events'));
    }

    public function sendSms(Trade $trade,$message)
    {
        $account_sid = getenv('TWILIO_SID');
        $auth_token = getenv('TWILIO_AUTH_TOKEN');
        $twilio_number = getenv('TWILIO_PHONE_NUMBER');
        
    

        $client = new Client('ACd7514d2513da9beb079af670e5a137aa', 'c7f755db3bdeb9d973008fd01d841136');
        $client->messages->create(
            '+21652942447', // Recipient's phone number
            [
                'from' => '+13436330403', // Your Twilio number
                'body' => $message
            ]
        );

    }

    public function accept(Trade $trade)
{
    $trade->update(['status' => 'accepted']);

    $statusMessage = $trade->status === 'accepted' ? 'accepted' : 'rejected';
    $message = "Hello, your trade proposition has been $statusMessage.\n";
    $message .= "Proposed by: " . $trade->owner->name . "\n";
    $message .= "Offered Item: " . $trade->offeredItem->title . "\n";
    $message .= "For more information, please check the trade details.";
    
   // $this->sendSms($trade,$message); // Call the sendSms method

    return redirect()->route('trades.index1')->with('success', 'Trade accepted successfully.');
}

public function reject(Trade $trade)
{

    $trade->update(['status' => 'rejected']);

    $statusMessage = $trade->status === 'accepted' ? 'accepted' : 'rejected';
    $message = "Hello, your trade proposition has been $statusMessage.\n";
    $message .= "Proposed by: " . $trade->owner->name . "\n";
    $message .= "Offered Item: " . $trade->offeredItem->title . "\n";
    $message .= "For more information, please check the trade details.";
    
  //  $this->sendSms($trade,$message); // Call the sendSms method

    return redirect()->route('trades.index1')->with('success', 'Trade rejected.');
}

}
