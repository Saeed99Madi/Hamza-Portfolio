<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $fillable = ['subtotal',
        'total',
        'fees',
        'forCompany',
        'firstname',
        'lastname',
        'phone',
        'email',
        'line1',
        'line2',
        'city',
        'state',
        'country',
        'zipcode',
        'On_behalf_off',
        'status',
        ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class,);
    }

    public function transaction(){
        return $this->hasOne(Transaction::class);
    }
}
