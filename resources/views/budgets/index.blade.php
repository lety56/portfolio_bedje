<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande Produits</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --gold-light: #FFF5E0;
            --gold-color: #FFC107;
            --dark-color: #212529;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }
        
        .btn-gold {
            background-color: var(--gold-color);
            color: var(--dark-color);
            font-weight: 700;
        }
        
        .btn-gold:hover {
            background-color: #e0a800;
            color: var(--dark-color);
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--gold-color);
            box-shadow: 0 0 0 0.25rem rgba(255, 193, 7, 0.25);
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <!-- Bouton pour ouvrir la modal -->
        <button type="button" class="btn btn-gold" data-bs-toggle="modal" data-bs-target="#orderModal">
            <i class="fas fa-shopping-cart me-2"></i>Passer une commande
        </button>

        <!-- Modal de commande -->
        <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- En-tête de la modal -->
                    <div class="modal-header" style="background-color: var(--gold-light); border-bottom: 2px solid var(--gold-color);">
                        <h5 class="modal-title" id="orderModalLabel">
                            <i class="fas fa-shopping-cart me-2"></i>Passer une commande
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!-- Corps de la modal -->
                    <div class="modal-body" style="padding: 30px;">
                        <form id="orderForm" action="{{ route('budgets.store') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <!-- Section Informations client -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="customerName" class="form-label">Nom complet *</label>
                                        <input type="text" class="form-control" id="customerName" name="customer_name" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="customerPhone" class="form-label">Téléphone *</label>
                                        <input type="tel" class="form-control" id="customerPhone" name="customer_phone" required>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="customerEmail" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="customerEmail" name="customer_email">
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="customerAddress" class="form-label">Adresse de livraison *</label>
                                        <textarea class="form-control" id="customerAddress" name="customer_address" rows="3" required></textarea>
                                    </div>
                                </div>

                                <!-- Section Produit -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="productSelect" class="form-label">Produit désiré *</label>
                                        <select class="form-select" id="productSelect" name="product_id" required>
                                            <option value="">Choisir un produit</option>
                                            @foreach($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->name }} - {{ number_format($product->price, 0, ',', ' ') }} FCFA</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="quantity" class="form-label">Quantité *</label>
                                        <input type="number" class="form-control" id="quantity" name="quantity" min="1" value="1" required>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="specialRequests" class="form-label">Demandes spéciales</label>
                                        <textarea class="form-control" id="specialRequests" name="special_requests" rows="2" placeholder="Instructions particulières, questions sur les produits..."></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Pied de page de la modal -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" form="orderForm" class="btn btn-gold">
                            <i class="fas fa-paper-plane me-2"></i>Confirmer la commande
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS et dépendances -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Script pour gérer la soumission du formulaire -->
    <script>
        document.getElementById('orderForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Ici vous pouvez ajouter du code pour gérer la soumission AJAX
            // ou laisser le formulaire se soumettre normalement
            
            this.submit();
        });
    </script>
</body>
</html>