<?php

namespace App\Analyzers;
use App\Models\Category;

class CategoryAnalyzer extends Category
{

    /**
     * Store Category.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCategory($request)
    {   
        return $this->isUnique($request->name) ? back()->with('error', __('მსგავსი კატეგორია არსებობს !')) : $this->storeIfUnique($request);
    }

    /**
     * Update Category.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateCategory($request, $id)
    {
        return $this->isUnique($request->name) ? back()->with('error', __('მსგავსი კატეგორია არსებობს !')) : $this->updateIfUnique($request, $id);
    }

    /**
     * Store Category.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeIfUnique($request)
    {
        $this->create($request->all());
        return redirect()->route('category')->with('success', __('კატეგორია წარმატებით დაემატა'));
    }

    /**
     * Update Category.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateIfUnique($request, $id)
    {
        $category = $this->find($id);
        $category->name = $request->name;
        $category->save();
        return redirect()->route('category')->with('success', __('კატეგორია წარმატებით განახლდა'));
    }
}