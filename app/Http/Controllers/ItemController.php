<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Dompdf\Dompdf;
use Dompdf\Options;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Vérifiez si un utilisateur est authentifié
        if (Auth::check()) {
            // Obtenez l'utilisateur actuellement authentifié
            $user = Auth::user();

            // Maintenant, vous pouvez utiliser $user pour filtrer les éléments de l'utilisateur connecté.
            $items = Item::where('user_id', $user->id)->paginate(4);

            return view('Template component/products', compact('items'));
        }

        // Gérez le cas où aucun utilisateur n'est authentifié, par exemple, redirigez vers la page de connexion.
        return redirect()->route('login');
    }

    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function indexmain(Request $request)
    { if (Auth::check()) {



        $search = $request->input('search');
        $sort = $request->input('sort', 'name');
        $categoryId = $request->input('category');

        $query = Item::query();

        if (!empty($search)) {
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
        }

        if ($categoryId) {
            // Filtrer par catégorie si une catégorie est sélectionnée
            $query->where('category_id', $categoryId);
        }

        if ($sort == 'name') {
            $query->orderBy('title', 'asc');
        } elseif ($sort == 'state') {
            $query->orderByState();
        } elseif ($sort == 'category') {
            $query->join('categories', 'items.category_id', '=', 'categories.id')
                ->orderBy('categories.name', 'asc');
        }

        $items = $query->paginate(8);

        $categories = Category::all();

        return view('Template component/index', compact('items', 'categories'));
    }
        // Gérez le cas où aucun utilisateur n'est authentifié, par exemple, redirigez vers la page de connexion.
        return redirect()->route('login');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('items.create', compact('categories'));
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
            'title' => 'required|string|max:15',
            'description' => 'nullable|string|max:255',
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

        return redirect()->route('items.index')->with('success', 'Élément créé avec succès.');
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\Item $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('Products component/Item_detail', compact('item'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Item $item
     * @return \Illuminate\Http\Response
     */
    public function showmain($id)
    {
        $item = Item::find($id);
         // Si l'élément est trouvé, affichez-le dans une vue
            return view('Products component/Item_detailmain', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Item $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $categories = Category::all();
        return view('items.edit', compact('item', 'categories'));
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
            'title' => 'required|string|max:15',
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

        return redirect()->route('items.index')->with('success', 'Élément modifié avec succès.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Item $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index')
            ->with('success', 'Élément supprimé avec succès.');
    }

    public function downloadPFE($id)
    {
        $item = Item::find($id);

        if (!$item) {
            return redirect()->route('items.index')->with('error', 'PFE non trouvé.');
        }

        // Configuration de Dompdf
        $pdfOptions = new Options();
        $pdfOptions->set('isPhpEnabled', true);
        $dompdf = new Dompdf($pdfOptions);

        // Contenu HTML du PDF (vous devrez générer votre propre contenu)
        $html = '<html><body><h1>Titre du PDF</h1><p>Contenu du PDF.</p></body></html>';

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Nom du fichier PDF
        $pdfFileName = $item->title . '.pdf';

        // Téléchargement du PDF
        return $dompdf->stream($pdfFileName);
    }

}
