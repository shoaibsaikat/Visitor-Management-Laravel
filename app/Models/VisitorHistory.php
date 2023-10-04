<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;
use App\Models\People;

class VisitorHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'card_no',
        'visitor_id',
        'officer_id'
    ];

    public function visitor(): HasOne
    {
        return $this->hasOne(People::class, 'id', 'visitor_id');
    }

    public function officer(): HasOne
    {
        return $this->hasOne(People::class, 'id', 'officer_id');
    }
}
