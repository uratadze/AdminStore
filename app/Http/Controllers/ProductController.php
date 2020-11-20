<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Analyzers\ProductAnalyzer;
use App\Models\Product;
use App\Http\Requests\AddProductRequest;

class ProductController extends Controller
{
    /**
     * @var integer
     */
    protected $perPage = 15;

    public function __construct(ProductAnalyzer $analyzer)
    {
        $this->analyzer = $analyzer;
    }

    /**
     * Show the product list.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        return view('vendor\backpack\base\products\list')
            ->with('products', Product::orderBy('id','desc')->paginate($this->perPage));
    }

    /**
     * Show the product add form.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('vendor\backpack\base\products\add');
    }

    /**
     * Show the product update form.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateForm($id)
    {
        return view('vendor\backpack\base\products\update')
            ->with('product', Product::find($id));        
    }

    /**
     * Store and redirect on list page.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AddProductRequest $request)
    {
        return $this->analyzer->store($request);
    }

    /**
     * update and redirect on list page.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(AddProductRequest $request, $id)
    {
        return $this->analyzer->updateProduct($request, $id);
    }

}
