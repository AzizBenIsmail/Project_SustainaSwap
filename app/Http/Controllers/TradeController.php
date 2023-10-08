<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use App\Models\Trade;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;
class TradeController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trades = Trade::all();
            // dd($trades->first()->owner->name);
        return view('trades.index', compact('trades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all(); // Retrieve all users
        $items = Item::all(); // Retrieve all items
    
        return view('trades.create', compact('users', 'items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'proposalDate' => 'required|date',
            'status' => 'required|string',
            'owner' => 'required|integer',
            'offered_item_id' => 'required|integer',
            'requested_item_id' => 'required|integer',
        ]);

      

        Trade::create($request->all());
        return redirect()->route('trades.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trade = Trade::findOrFail($id);
        return view('trades.show', compact('trade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
        $users = User::all(); // Retrieve all users
        $items = Item::all(); // Retrieve all items
    
    
        $trade = Trade::findOrFail($id);
        return view('trades.edit', compact('trade','users', 'items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'proposalDate' => 'required|date',
            'status' => 'required|string',
            'owner_id' => 'required|integer',
            'offered_item_id' => 'required|integer',
            'requested_item_id' => 'required|integer',
        ]);

     

        $trade = Trade::findOrFail($id);
        $trade->update($request->all());
        return redirect()->route('trades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trade = Trade::findOrFail($id);
        $trade->delete();
        return redirect()->route('trades.index');
    }
}
