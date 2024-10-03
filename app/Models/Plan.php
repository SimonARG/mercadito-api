<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plan extends Model
{
    protected $fillable = [
        'name',
        'monthly_buy_tokens',
        'monthly_sell_tokens',
    ];

    public $timestamps = false;

    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }
}
