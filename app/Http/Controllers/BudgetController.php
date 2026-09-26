<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BudgetController extends Controller
{
    /**
     * Affiche le formulaire de commande
     */
    public function index(): View
    {
        $products = Product::all(); // Récupère tous les produits depuis la base de données
        
        return view('budgets.index', [
            'products' => $products
        ]);
    }

    /**
     * Stocke une nouvelle commande
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'customer_email' => 'nullable|email|max:255',
            'customer_address' => 'required|string|max:500',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'special_requests' => 'nullable|string|max:1000',
        ]);

        // Récupère le produit sélectionné
        $product = Product::findOrFail($validated['product_id']);

        // Crée la commande
        $budget = Budget::create([
            'customer_name' => $validated['customer_name'],
            'customer_phone' => $validated['customer_phone'],
            'customer_email' => $validated['customer_email'],
            'customer_address' => $validated['customer_address'],
            'product_id' => $product->id,
            'product_name' => $product->name,
            'product_price' => $product->price,
            'quantity' => $validated['quantity'],
            'special_requests' => $validated['special_requests'],
            'status' => 'pending'
        ]);

        return redirect()->route('budgets.confirmation', $budget)
            ->with('success', 'Votre commande a été enregistrée avec succès!');
    }

    /**
     * Affiche la page de confirmation
     */
    public function confirmation(Budget $budget): View
    {
        return view('budgets.confirmation', compact('budget'));
    }

    /**
     * Liste des commandes (pour l'admin)
     */
    public function list(): View
    {
        $budgets = Budget::latest()->paginate(15);
        return view('budgets.list', compact('budgets'));
    }
}