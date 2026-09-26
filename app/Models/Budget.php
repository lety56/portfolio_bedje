<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Budget extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'customer_phone',
        'customer_email',
        'customer_address',
        'product_id',
        'product_name',
        'product_price',
        'quantity',
        'special_requests',
        'status'
    ];

    protected $casts = [
        'product_price' => 'decimal:2',
    ];

    const STATUSES = [
        'pending' => 'En attente',
        'confirmed' => 'Confirmé',
        'shipped' => 'Expédié',
        'delivered' => 'Livré',
        'cancelled' => 'Annulé'
    ];

    protected function statusLabel(): Attribute
    {
        return Attribute::make(
            get: fn () => self::STATUSES[$this->status] ?? $this->status,
        );
    }

    public function calculateTotal()
    {
        return $this->product_price * $this->quantity;
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed');
    }
}