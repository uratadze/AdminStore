<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * @var integer
     */
    protected $table = 'products';

    /**
     * @var array
     */
    protected $fillable = ['name', 'header_picture_path', 'price', 'quantity','category', 'status', 'description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getCategory()
    {
        return $this->belongsTo(Category::class, 'category', 'id');
    }

    /**
     * @return string
     */
    public function statusName()
    {
        if ($this->status == 1) {
            return 'აქტიური';
        } else {
            return 'არააქტიური';
        }
    }
}
