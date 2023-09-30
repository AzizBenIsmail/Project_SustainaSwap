<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation de l'image
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string|max:255',
            'duration' => 'required|integer|min:1|max:7',
            'state' => 'required|string|max:255',
        ]);

        if ($request->hasFile('picture')) {
            $image = $request->file('picture');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
        } else {
            // Gérez le cas où aucune image n'est téléchargée
            $imageName = ''; // Vous pouvez définir une valeur par défaut ou générer une erreur
        }

        $item = new Item([
            'picture' => $imageName,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'category' => $request->input('category'),
            'duration' => $request->input('duration'),
            'state' => $request->input('state'),
//            'user_id' => auth()->user()->id, // Vous devrez ajuster cette partie en fonction de votre authentification
            'user_id'=> 1,
        ]);

        $item->save();

        return redirect()->route('items.index')->with('success', 'Élément créé avec succès.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        // Valider les données du formulaire
        $request->validate([
            'picture' => 'required',
            'title' => 'required|max:12',
            'description' => 'max:100',
            'category' => 'required',
            'duration' => 'required|integer|min:1|max:7',
            'state' => 'required',
        ]);

        // Mettre à jour les données de l'élément
        $item->update($request->all());

        // Rediriger vers la liste des éléments
        return redirect()->route('items.index')
            ->with('success', 'Élément mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        // Supprimer l'élément de la base de données
        $item->delete();

        // Rediriger vers la liste des éléments
        return redirect()->route('items.index')
            ->with('success', 'Élément supprimé avec succès.');
    }
}
