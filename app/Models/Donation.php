<?php

namespace App\Models;

use App\Traits\DonationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    use DonationTrait;

    protected $guarded = ['id'];


    public function donor()
    {
        return $this->belongsTo(User::class, 'donor_id');
    }

    public function beneficiary()
    {
        return $this->belongsTo(User::class, 'beneficiary_id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function scopeSearch($query, $search)
    {
        if ($search !== null) {
            $query->where('event_id', $search);
        }
        return $query;
    }
}
