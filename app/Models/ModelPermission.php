<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelPermission extends Model
{
    /**
     * @var string
     */
    protected $table = 'model_has_permissions';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */ 
    protected $fillable = ['permission_id', 'model_type', 'model_id'];

}
