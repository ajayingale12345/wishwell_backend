<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    protected $fillable = [
        'donor_id',
        'campaign_id',
        'amount',
        'transaction_date',
    ];
    public function donor()
    {
        return $this->belongsTo(AllUser::class,'donor_id');
    }
    public function campaign()
    {
        return $this->belongsTo(campaign::class,'campaign_id');
    }

}
