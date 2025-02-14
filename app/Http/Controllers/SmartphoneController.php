<?php
// SmartphoneController.php
namespace App\Http\Controllers;

use App\Models\Smartphone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SmartphoneController extends Controller
{
    public function home()
    {
        $smartphones = Smartphone::latest()->paginate(4);
        return view('home', compact('smartphones'));
    }
    // public function index(Request $request)
    // {
    //     $query = Smartphone::query();

    //     // Filtrage par nom
    //     if ($request->filled('nom')) {
    //         $searchTerm = $request->input('nom');
    //         $query->where('nom', 'LIKE', "%{$searchTerm}%");
    //     }

    //     // Récupération des smartphones avec pagination
    //     $smartphones = $query->paginate(12)
    //                     ; // Garde les paramètres de recherche dans les liens de pagination

    //     return view('smartphones.index', compact('smartphones'));
    // }
    // public function index(Request $request)
    // {
    //     $query = Smartphone::query();

    //     // Filtrage par nom
    //     if ($request->filled('nom')) {
    //         $searchTerm = $request->input('nom');
    //         $query->where('nom', 'LIKE', "%{$searchTerm}%");
    //     }

    //     // Filtrage par marque
    //     if ($request->filled('marques')) {
    //         $query->whereIn('marque', $request->marques);
    //     }

    //     // Filtrage par prix
    //     if ($request->filled('prix_min')) {
    //         $query->where('prix', '>=', $request->prix_min);
    //     }
    //     if ($request->filled('prix_max')) {
    //         $query->where('prix', '<=', $request->prix_max);
    //     }

    //     // Filtrage par stockage
    //     if ($request->filled('stockages')) {
    //         $query->whereIn('rom', $request->stockages);
    //     }

    //     // Tri
    //     $sort = $request->input('sort', 'latest');
    //     switch ($sort) {
    //         case 'price_low':
    //             $query->orderBy('prix', 'asc');
    //             break;
    //         case 'price_high':
    //             $query->orderBy('prix', 'desc');
    //             break;
    //         case 'popularity':
    //             // Si vous avez un champ pour la popularité
    //             // $query->orderBy('views', 'desc');
    //             break;
    //         default:
    //             $query->latest();
    //             break;
    //     }

    //     $smartphones = $query->paginate(12);

    //     // Récupérer les marques distinctes pour les filtres
    //     $marques = Smartphone::distinct()->pluck('marque');

    //     // Récupérer les capacités de stockage distinctes
    //     $stockages = Smartphone::distinct()->pluck('rom');

    //     return view('smartphones.index', compact('smartphones', 'marques', 'stockages'));
    // }
    public function index(Request $request)
    {
        $query = Smartphone::query();

        // Filtrage par nom
        if ($request->filled('nom')) {
            $searchTerm = $request->input('nom');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('nom', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('marque', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('description', 'LIKE', "%{$searchTerm}%");
            });
        }
        $query = Smartphone::query();

        if ($request->filled('marque')) {
            $query->where('marque', $request->marque);
        }

        if ($request->filled('stockage')) {
            $query->where('rom', $request->stockage);
        }

        if ($request->filled('prix')) {
            list($min, $max) = explode('-', $request->prix . '+');
            if ($max == '+') {
                $query->where('prix', '>=', $min);
            } else {
                $query->whereBetween('prix', [$min, $max]);
            }
        }
        $smartphones = $query->latest()->paginate(12);

        if ($request->ajax()) {
            return view('smartphones.partials.products-grid', compact('smartphones'))->render();
        }

        return view('smartphones.index', compact('smartphones'));
    }
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nom' => 'required|string|max:255',
                'marque' => 'required|string|max:255',
                'description' => 'required|string',
                'prix' => 'required|numeric|min:0',
                'photo_url' => 'required|url',
                'ram' => 'required|string',
                'rom' => 'required|string',
                'ecran' => 'required|string',
                'couleurs_disponibles' => 'required|string'
            ]);

            // Transformer photo_url en photo
            $validated['photo'] = $validated['photo_url'];
            unset($validated['photo_url']);

            $smartphone = Smartphone::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Smartphone ajouté avec succès',
                'data' => $smartphone
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'errors' => $e->getMessage()
            ], 422);
        }
    }

    public function show(Smartphone $smartphone)
    {
        return view('smartphones.show', compact('smartphone'));
    }
    public function edit($id)
    {
        $smartphone = Smartphone::findOrFail($id);
        return response()->json($smartphone);
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'nom' => 'required|string|max:255',
                'marque' => 'required|string|max:255',
                'description' => 'required|string',
                'prix' => 'required|numeric|min:0',
                'photo_url' => 'required|url',
                'ram' => 'required|string',
                'rom' => 'required|string',
                'ecran' => 'required|string',
                'couleurs_disponibles' => 'required|string'
            ]);

            $smartphone = Smartphone::findOrFail($id);

            $validated['photo'] = $validated['photo_url'];
            unset($validated['photo_url']);

            $smartphone->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Smartphone mis à jour avec succès',
                'data' => $smartphone
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'errors' => $e->getMessage()
            ], 422);
        }
    }

    public function destroy(Smartphone $smartphone)
    {
        try {
            $smartphone->delete();
            return response()->json([
                'success' => true,
                'message' => 'Smartphone supprimé avec succès'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'errors' => $e->getMessage()
            ], 422);
        }
    }
    public function search(Request $request)
    {
        $query = $request->input('nom');

        $smartphones = Smartphone::query()
            ->where('nom', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->take(5)
            ->get(['id', 'nom', 'prix', 'photo']);

        return response()->json($smartphones);
    }
}
