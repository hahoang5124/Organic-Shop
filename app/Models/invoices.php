<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoices extends Model
{
    use HasFactory;
    protected $fillable = ['createdate','totalitems','totalcost','userid','status'];
    public function scopecheckCart($query, $userId){
        return $query->where('userid', $userId)->where('status', 0);
    }
}
