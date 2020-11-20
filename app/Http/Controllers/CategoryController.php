<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Analyzers\CategoryAnalyzer;
use App\Models\Category;
use App\Http\Requests\AddCategoryRequest;

class CategoryController extends Controller
{

    public function __construct(CategoryAnalyzer $analyzer)
    {
        $this->analyzer = $analyzer;
    }

    /**
     * Show the category list.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        return view('vendor\backpack\base\category\list')
            ->with('categories', Category::orderBy('id','desc')->get());
    }

    /**
     * Show the create form.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor\backpack\base\category\create');
    }
    
    /**
     * Show the update form.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateForm($id)
    {
        return view('vendor\backpack\base\category\update')
            ->with('category', Category::find($id));
    }

    /**
     * Store and redirect on list page.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AddCategoryRequest $request)
    {
        return $this->analyzer->createCategory($request);
    }

    /**
     * Update and redirect on list page.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(AddCategoryRequest $request,$id)
    {
        return $this->analyzer->updateCategory($request, $id);
    }

}
