<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avis;

class AvisController extends Controller
{
    public function create()
    {
        // Return a view to create a new avis
        return view('avis.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'comment' => 'required|string|max:20',
            'trade_id' => 'required|exists:trades,id',
        ], [
            'comment.required' => 'The comment is required.',
            'comment.string' => 'The comment must be a string.',
            'comment.max' => 'The comment must not exceed 20 characters.',
           
        ]);

        // Create a new avis with the validated data
        Avis::create($validatedData);

        // You can also add a success message or redirect to a relevant page
        return redirect()->route('trades.show', $validatedData['trade_id']);
    }

    public function edit($id)
    {
        // Find the avis by its ID
        $avis = Avis::findOrFail($id);

        // Return a view to edit the avis
        return view('avis.edit', compact('avis'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'comment' => 'required',
            'trade_id' => 'required|exists:trades,id',
        ]);

        // Find the avis by its ID
        $avis = Avis::findOrFail($id);

        // Update the avis with the validated data
        $avis->update($validatedData);

        // You can also add a success message or redirect to the trade's details page
        return redirect()->route('trades.show', $validatedData['trade_id']);
    }

    public function destroy($id)
    {
        // Find the avis by its ID
        $avis = Avis::findOrFail($id);

        // Store the trade ID before deleting
        $tradeId = $avis->trade_id;

        // Delete the avis
        $avis->delete();

        // You can also add a success message or redirect to the trade's details page
        return redirect()->route('trades.show', $tradeId);
    }
}
