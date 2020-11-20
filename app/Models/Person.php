<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Person extends Model
{
    /**
     * @var string
     */
    protected $table = 'persons';

    /**
     * @var string
     */
    protected $fillable = ['user', 'passport', 'first_name', 'last_name', 'Address', 'city', 'number'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }

    /**
     * @return string
     */
    public function fullName()
    {
        return $this->first_name.' '.$this->last_name;
    }
}
