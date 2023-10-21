<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Trade;
use App\Models\User;
use App\Models\Item;
use App\Models\Avis;

class AdminTradeController extends Controller
{
    public function index()
    {
        $trades = Trade::all();
        return view('trades/backOffice/index', compact('trades'));
    }

       public function show($id)
    {
        $trade = Trade::findOrFail($id);
    
        // Load the associated "Avis" records for the trade
        $trade->load('avis');
    
        return view('trades/backOffice/show', compact('trade'));
    }


 

    public function destroy($id)
    {
        $trade = Trade::findOrFail($id);
        $trade->delete();
        return redirect()->route('tradesAdmin.index');
    }

}
