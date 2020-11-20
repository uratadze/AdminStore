<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Analyzers\OrderAnalyzer;

class OrderController extends Controller
{
    /**
     * @var integer
     */
    protected $perPage = 5;

    /**
     * Show the order list.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vendor\backpack\base\orders\list')
            ->with('orders', OrderAnalyzer::orderBy('id','desc')->paginate($this->perPage));
    }

    /**
     * update and redirect on list page.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(OrderAnalyzer $analyzer, Request $request)
    {
        return $analyzer->updateOrder($request);
    }
        
}
