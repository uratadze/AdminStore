<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SoldProduct;

class SoldProductController extends Controller
{
    /**
     * @var integer
     */
    protected $perPage = 5;

    /**
     * Show the sold product list.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vendor\backpack\base\products\sold\list')
            ->with('products', SoldProduct::orderBy('id','desc')->paginate($this->perPage));
    }
}
