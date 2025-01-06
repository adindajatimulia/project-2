<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mtvs\EloquentHashids\HasHashid;
use Mtvs\EloquentHashids\HashidRouting;

class MenuItem extends Model
{
    use HasFactory, HasHashid, HashidRouting;
    
    protected $guarded = [];
    protected $appends = ['hashid'];

    protected $fillable = ['name', 'eng_name', 'description', 'eng_description', 'price', 'category_id', 'vendor_id'];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}

