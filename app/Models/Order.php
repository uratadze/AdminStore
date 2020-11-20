<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * @var string
     */
    protected $table = 'orders';

    /**
     * @var array
     */
    protected $fillable = ['person', 'product', 'quantity', 'status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getPerson()
    {
        return $this->belongsTo(Person::class, 'person', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getProduct()
    {
        return $this->belongsTo(Product::class, 'product', 'id');
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        if($this->status==0)
        {
            return __('მიუღებელი');
        }
        elseif($this->status==1)
        {
            return __('მიღებული');
        }
        else
        {
            return __('შესრულებული');
        }
    }

}
