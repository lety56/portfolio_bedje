<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = [
            [
                'id' => 1,
                'name' => 'Lety Hair Sérum Anti-Chute',
                'description' => 'Sérum révolutionnaire contre la chute des cheveux',
                'price' => 45.99,
                'image' => 'serum-anti-chute.jpg',
                'benefits' => ['Réduit la chute', 'Stimule la croissance', 'Fortifie les racines']
            ],
            [
                'id' => 2,
                'name' => 'Lety Hair Shampoing Fortifiant',
                'description' => 'Shampoing spécialisé contre la cassure',
                'price' => 32.99,
                'image' => 'shampoing-fortifiant.jpg',
                'benefits' => ['Répare la fibre', 'Prévient la cassure', 'Nourrit en profondeur']
            ],
            [
                'id' => 3,
                'name' => 'Lety Hair Lotion Anti-Pelliculaire',
                'description' => 'Solution efficace contre les pellicules',
                'price' => 38.99,
                'image' => 'lotion-pellicules.jpg',
                'benefits' => ['Élimine les pellicules', 'Apaise le cuir chevelu', 'Action longue durée']
            ]
        ];

        $testimonials = [
            [
                'name' => 'Marie Dubois',
                'comment' => 'Mes cheveux ont retrouvé leur éclat grâce à Lety Hair. Plus de chute excessive!',
                'rating' => 5,
                'product' => 'Sérum Anti-Chute'
            ],
            [
                'name' => 'Fatou Diallo',
                'comment' => 'Le shampoing fortifiant a transformé mes cheveux cassants. Je recommande vivement!',
                'rating' => 5,
                'product' => 'Shampoing Fortifiant'
            ],
            [
                'name' => 'Sarah Johnson',
                'comment' => 'Enfin une solution efficace contre mes pellicules persistantes.',
                'rating' => 4,
                'product' => 'Lotion Anti-Pelliculaire'
            ]
        ];

        return view('welcome', compact('featuredProducts', 'testimonials'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'paymentMethod' => 'required|string|in:orange-money,mobile-money,bank-check',
            'salePercentage' => 'required|numeric|min:0|max:100',
            'discount' => 'nullable|numeric|min:0|max:100',
            'deliveryOption' => 'required|string|in:standard,express,pickup',
            'deliveryDestination' => 'required|string|max:255',
            'message' => 'nullable|string|max:1000',
        ]);

        // Process the data (e.g., save to database or perform other logic)
        // For now, redirect with a success message
        return redirect()->route('budgets.index')->with('success', 'Budget soumis avec succès!');
    }
}