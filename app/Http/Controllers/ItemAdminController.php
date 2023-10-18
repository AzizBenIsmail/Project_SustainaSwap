<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('items/backOffice/index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('items/backOffice/create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'state' => 'required|string|max:255',
        ]);

        if ($request->hasFile('picture')) {
            $image = $request->file('picture');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
        } else {
            $imageName = '';
        }
        $category = Category::find($request->input('category'));
        $item = new Item([
            'picture' => $imageName,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'category_id' => $category->id,
            'state' => $request->input('state'),
            'user_id' => auth()->user()->id,
//            'user_id'=> 1,
        ]);

        $item->save();

        return redirect()->route('itemsAdmin.index')->with('success', 'Élément créé avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Item $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        $category = Category::find($item->category_id);
        return view('items/backOffice/show', compact('item', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Item $item
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        $categories = Category::all();
        return view('items/backOffice/edit', compact('item', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Item $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'state' => 'required|string|max:255',
        ]);

        $item = Item::findOrFail($id);

        if ($request->hasFile('picture')) {
            $image = $request->file('picture');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $item->picture = $imageName;
        }
        $category = Category::find($request->input('category'));

        $item->title = $request->input('title');
        $item->description = $request->input('description');
        $item->category_id = $category->id;
        $item->state = $request->input('state');

        $item->save();

        return redirect()->route('itemsAdmin.index')->with('success', 'Élément modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Item $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);

        if (!$item) {
            return redirect()->route('itemsAdmin.index')->with('error', 'Élément non trouvé.');
        }

        // Assurez-vous que l'élément est lié à l'utilisateur ou implémentez la logique de vérification appropriée.

        $item->delete();

        return redirect()->route('itemsAdmin.index')->with('success', 'Élément supprimé avec succès.');
    }

}
