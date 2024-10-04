<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'employe_id',
        'amount',
        'payment_date',
        'month',
        'year',
        'status',
    ];

    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }
}
