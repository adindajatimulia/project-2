<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mtvs\EloquentHashids\HasHashid;
use Mtvs\EloquentHashids\HashidRouting;

class Vendor extends Model
{
    use HasFactory, HasHashid, HashidRouting;

    protected $guarded = [];
    protected $appends = ['hashid'];

    protected $fillable = ['name', 'address', 'contact_person'];

    public function menuItem(){
        return $this->hasMany(MenuItem::class);
    }
}
