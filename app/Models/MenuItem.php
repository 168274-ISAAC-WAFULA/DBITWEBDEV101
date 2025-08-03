<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'image',
        'is_available',
        'preparation_time'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function inventoryItems()
    {
        return $this->belongsToMany(Inventory::class, 'menu_inventory')
            ->withPivot('quantity_required');
    }
}
