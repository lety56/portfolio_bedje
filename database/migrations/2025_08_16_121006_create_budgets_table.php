<?php

// Fichier: database/migrations/xxxx_xx_xx_xxxxxx_create_budgets_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->enum('payment_method', ['orange-money', 'mobile-money', 'bank-check'])
                  ->comment('Méthode de paiement choisie');
            $table->decimal('sale_percentage', 5, 2)
                  ->comment('Pourcentage de vente (0.00 à 100.00)');
            $table->decimal('discount', 5, 2)
                  ->nullable()
                  ->default(0.00)
                  ->comment('Remise appliquée (0.00 à 100.00)');
            $table->enum('delivery_option', ['standard', 'express', 'pickup'])
                  ->comment('Option de livraison');
            $table->string('delivery_destination')
                  ->comment('Destination de livraison');
            $table->text('message')
                  ->nullable()
                  ->comment('Message de vérification optionnel');
            $table->enum('status', ['pending', 'validated', 'rejected'])
                  ->default('pending')
                  ->comment('Statut du budget');
            $table->decimal('total_amount', 10, 2)
                  ->nullable()
                  ->comment('Montant total calculé');
            $table->decimal('delivery_cost', 8, 2)
                  ->nullable()
                  ->comment('Coût de livraison');
            $table->timestamp('validated_at')->nullable();
            $table->timestamps();
            
            // Index pour optimiser les requêtes
            $table->index(['status', 'created_at']);
            $table->index('payment_method');
            $table->index('delivery_option');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budgets');
    }
};