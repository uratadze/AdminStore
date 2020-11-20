<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoldProduct extends Model
{
    /**
     * @var string
     */
    protected $table = 'sold_products';

    /**
     * @var array
     */
    protected $fillable = ['product', 'quantity','buyer'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function stockProduct()
    {
        return $this->belongsTo(Product::class, 'product', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function buyerId()
    {
        return $this->belongsTo(Person::class, 'buyer', 'id');
    }

}
