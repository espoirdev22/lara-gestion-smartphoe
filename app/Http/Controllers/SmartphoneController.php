<?php
// app/Http/Controllers/SmartphoneController.php
namespace App\Http\Controllers;

use App\Models\Smartphone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SmartphoneController extends Controller
{
    public function index()
    {
        $smartphones = Smartphone::latest()->paginate(12);
        return view('smartphones.index', compact('smartphones'));
    }

    public function home()
    {
        $smartphones = Smartphone::latest()->paginate(4);
        return view('home', compact('smartphones'));
    }
    

    public function show(Smartphone $smartphone)
    {
        return view('smartphones.show', compact('smartphone'));
    }

    public function create()
    {
        return view('smartphones.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'marque' => 'required|string|max:255',
            'description' => 'required|string',
            'prix' => 'required|numeric|min:0',
            'photo' => 'required|image|max:2048',
            'ram' => 'required|string',
            'rom' => 'required|string',
            'ecran' => 'required|string',
            'couleurs_disponibles' => 'required|string'
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('smartphones', 'public');
        }

        Smartphone::create($validated);
        return redirect()->route('smartphones.index')->with('success', 'Smartphone added successfully');
    }

    public function edit(Smartphone $smartphone)
    {
        return view('smartphones.edit', compact('smartphone'));
    }

    public function update(Request $request, Smartphone $smartphone)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'marque' => 'required|string|max:255',
            'description' => 'required|string',
            'prix' => 'required|numeric|min:0',
            'photo' => 'nullable|image|max:2048',
            'ram' => 'required|string',
            'rom' => 'required|string',
            'ecran' => 'required|string',
            'couleurs_disponibles' => 'required|string'
        ]);

        if ($request->hasFile('photo')) {
            if ($smartphone->photo) {
                Storage::disk('public')->delete($smartphone->photo);
            }
            $validated['photo'] = $request->file('photo')->store('smartphones', 'public');
        }

        $smartphone->update($validated);
        return redirect()->route('smartphones.index')->with('success', 'Smartphone updated successfully');
    }

    public function destroy(Smartphone $smartphone)
    {
        if ($smartphone->photo) {
            Storage::disk('public')->delete($smartphone->photo);
        }
        $smartphone->delete();
        return redirect()->route('smartphones.index')->with('success', 'Smartphone deleted successfully');
    }
    
}