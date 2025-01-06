<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mtvs\EloquentHashids\HasHashid;
use Mtvs\EloquentHashids\HashidRouting;

class Table extends Model
{
    use HasFactory, HasHashid, HashidRouting;

    protected $guarded = [];
    protected $appends = ['hashid'];

    protected $fillable = ['table_code', 'is_occupied'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
