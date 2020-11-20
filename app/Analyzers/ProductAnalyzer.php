<?php

namespace App\Analyzers;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;


class ProductAnalyzer extends Product
{
    /**
     * @var string
     */
    protected $storageDisk = 'public';

    /**
     * Store Product.
     *
     * @return \Illuminate\Http\Response
     */
    public function store($request)
    {   
        $this->create([
            'name' => $request->name,
            'header_picture_path' => $request->headerImage ? $this->storePicture($request):NULL,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category' => $request->category,
            'status' => $request->status,
            'description' => $request->description
        ]);
        return redirect()->route('product')->with('success', __('პროდუქტი წარმატებით დაემატა'));
    }

    /**
     * Store Product Picture In Local Folder.
     *
     * @return string
     */
    public function storePicture($request)
    {
        $file = $request->file('headerImage');
        $extension = $file->extension();
        $fileName = time().'.'.$extension;
        $request->headerImage->storeAs('product', $fileName, $this->storageDisk);
        return strval($fileName);
    }

    /**
     * Delete Product Picture In Local Folder.
     */
    public function deletePicture($pictureName)
    {
        Storage::disk($this->storageDisk)->delete('product/'.$pictureName);
    }

    /**
     * Update Product.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateProduct($request, $id)
    {
        $product = $this->find($id);
        $request->headerImage ? $product->header_picture_path = $this->updatePicture($product->header_picture_path, $request):'';
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category;
        $product->status = $request->status;
        $product->description = $request->description;
        $product->save();
        return redirect()->route('product')->with('success', __('პროდუქტი წარმატებით განახლდა'));
    }

    /**
     * Update Product Picture.
     *
     * @return string
     */
    public function updatePicture($oldPicture, $newPicture)
    {
        $this->deletePicture($oldPicture);
        return $this->storePicture($newPicture);
    }

}