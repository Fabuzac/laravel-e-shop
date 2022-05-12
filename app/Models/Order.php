<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // protected $table = 'orders';

    protected $fillable = [
        'user_id', 'paiement_firstname', 'paiement_lastname', 'paiement_phone', 'paiement_email', 'paiement_address', 'paiement_city',
        'paiement_postalcode', 'discount', 'paiement_total',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product')->withPivot('quantity');
    }

    public function coupons()
    {
        return $this->belongsToMany('App\Models\Coupon')->withPivot('value');
    }
}
