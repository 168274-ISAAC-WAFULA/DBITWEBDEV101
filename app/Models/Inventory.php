<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'unit',
        'current_stock',
        'minimum_stock',
        'unit_cost',
        'supplier',
        'expiry_date'
    ];

    public function menuItems()
    {
        return $this->belongsToMany(MenuItem::class, 'menu_inventory')
            ->withPivot('quantity_required');
    }
}
