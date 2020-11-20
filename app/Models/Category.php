<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * @var integer
     */
    protected $table = 'categories';
    
    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return bool
     */
    public function isUnique($name)
    {
        return $this->where('name', $name)->count() > 0;
    }
}
