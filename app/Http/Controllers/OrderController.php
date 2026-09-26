<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Valider la requête
        $validated = $request->validate([
            'customerName' => 'required|string|max:255',
            'customerPhone' => 'required|string|max:20',
            'customerEmail' => 'nullable|email|max:255',
            'customerAddress' => 'required|string',
            'productSelect' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'specialRequests' => 'nullable|string',
        ]);

        // Enregistrer la commande dans la base de données
        $order = Order::create([
            'customer_name' => $validated['customerName'],
            'customer_phone' => $validated['customerPhone'],
            'customer_email' => $validated['customerEmail'],
            'customer_address' => $validated['customerAddress'],
            'product' => $validated['productSelect'],
            'quantity' => $validated['quantity'],
            'special_requests' => $validated['specialRequests'],
        ]);

        // Préparer le message de la commande
        $message = "Nouvelle commande reçue:\n";
        $message .= "Nom: {$order->customer_name}\n";
        $message .= "Téléphone: {$order->customer_phone}\n";
        $message .= "Email: {$order->customer_email}\n";
        $message .= "Adresse: {$order->customer_address}\n";
        $message .= "Produit: {$order->product}\n";
        $message .= "Quantité: {$order->quantity}\n";
        $message .= "Demandes spéciales: {$order->special_requests}";

        // Envoyer message WhatsApp
        $this->sendWhatsApp($message);

        // Envoyer email
        $this->sendEmail($order);

        // Retourner une réponse JSON pour AJAX
        return response()->json([
            'message' => 'Commande envoyée avec succès ! Nous vous contacterons sous peu.',
            'status' => 'success'
        ]);
    }

    private function sendWhatsApp($message)
    {
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $client = new Client($sid, $token);

        try {
            $client->messages->create(
                'whatsapp:' . env('SUPPLIER_PHONE_NUMBER', '+237679202505'),
                [
                    'from' => env('TWILIO_WHATSAPP_NUMBER'),
                    'body' => $message,
                ]
            );
            \Log::info('Message WhatsApp envoyé avec succès.');
        } catch (\Exception $e) {
            \Log::error('Échec de l\'envoi du message WhatsApp : ' . $e->getMessage());
        }
    }

    private function sendEmail($order)
    {
        try {
            Mail::to('letyhairlh@gmail.com')->send(new \App\Mail\OrderPlaced($order));
        } catch (\Exception $e) {
            \Log::error('Échec de l\'envoi de l\'email : ' . $e->getMessage());
        }
    }
}