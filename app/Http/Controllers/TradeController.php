<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Trade;
use App\Models\User;
use App\Models\Item;
use App\Models\Avis;

class TradeController extends Controller
{
    public function index()
    {
        $trades = Trade::all();
        return view('trades.index', compact('trades'));
    }

    public function create()
    {
       
        $items = Item::all();
        return view('trades.create', compact( 'items'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tradeStartDate' => 'required|date',
            'tradeEndDate' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

      
       
        
        $ownerId = auth()->user()->id;
        $requestedItemId = $request->input('item_id');
        $status = $request->input('status', 'pending');
      
        Trade::create([
            'tradeStartDate' => $request->input('tradeStartDate'),
            'tradeEndDate' => $request->input('tradeEndDate'),
            'status' => $status,
            'owner_id' => $ownerId,
            'offered_item_id' => $request->input('offered_item_id'),
            'requested_item_id' => 1,
        ]);

        return redirect()->route('trades.index');
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
            'tradeEndDate' => 'required|date',
            'status' => 'required|string|in:pending,accepted,rejected',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $trade = Trade::findOrFail($id);
        $trade->update($request->all());
        return redirect()->route('trades.index');
    }
 

    public function destroy($id)
    {
        $trade = Trade::findOrFail($id);
        $trade->delete();
        return redirect()->route('trades.index');
    }
      /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
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
        $trades = Trade::all();
    
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

}
