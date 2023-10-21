<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Trade;
use Illuminate\Http\Request;

class TradeController extends Controller
{
    /**
     * Display a listing of the trades.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trades = Trade::all();
        return view('trades/backOffice/index', compact('trades'));
    }

    /**
     * Show the form for creating a new trade.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // You may need to load associated data (items, users, etc.) as needed
        return view('trades/backOffice/create');
    }

    /**
     * Store a newly created trade in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation and storage logic for creating a new trade

        return redirect()->route('trades.index')->with('success', 'Trade created successfully.');
    }

    /**
     * Display the specified trade.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trade = Trade::findOrFail($id);

        // You may need to load associated data (user, items, avis, etc.) as needed

        return view('trades/backOffice/show', compact('trade'));
    }

    /**
     * Show the form for editing the specified trade.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trade = Trade::findOrFail($id);

        // You may need to load associated data (user, items, avis, etc.) as needed

        return view('trades/backOffice/edit', compact('trade'));
    }

    /**
     * Update the specified trade in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validation and storage logic for updating the trade

        return redirect()->route('trades.index')->with('success', 'Trade updated successfully.');
    }

    /**
     * Remove the specified trade from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trade = Trade::findOrFail($id);

        // Implement logic for deleting a trade

        return redirect()->route('trades.index')->with('success', 'Trade deleted successfully.');
    }
}
