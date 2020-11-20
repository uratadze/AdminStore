<?php

namespace App\Analyzers;
use App\Models\Transaction;
use App\Models\Order;
use App\Models\Product;
use App\Models\SoldProduct;

class OrderAnalyzer extends Order
{
    /**
     * change order and fill sold products.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateOrder($request)
    {
        $order = Order::find($request->id);
        //if order is unacceptable
        if($order->status == 0)
        {
            //order accepted
            $this->reception($order);
            return back();
        }
        //if order is accepted
        elseif($order->status == 1)
        {
            //done order
            $this->complete($order);
        }
        return back();
    }

    public function reception($order)
    {
        //add transaction amount 
        $this->addTransaction($this->orderPrice($order));
        //remove product count  
        $this->updateProductCount($order);
        //change status to 1 
        $this->changeStatus($order, 1);
    }

    public function complete($order)
    {
        //fill sold product table
        $this->fillAsSoldItem($order);
        //change status to 2
        $this->changeStatus($order, 2);
    }

    /**
     * @return integer
     */
    public function orderPrice($order)
    {
        return $order->quantity * $order->getProduct->price;
    }

    /**
     * @create App\Models\Transaction
     */
    public function addTransaction($amount)
    {
        Transaction::create(['amount'=>$amount]);
    }

    /**
     * Update product stock
     * 
     * @update App\Models\Product
     */
    public function updateProductCount($order)
    {
        $product = Product::find($order->getProduct->id);
        $count = $product->quantity - $order->quantity;
        $product->quantity = $count;
        $product->save();
    }

    /**
     * Update order status
     * 
     * @update App\Models\Order
     */
    public function changeStatus($order, $statusCode)
    {
        $order->status = $statusCode;
        $order->save();
    }

    /**
     * Fill sold product
     * 
     * @create App\Models\SoldProduct
     */
    public function fillAsSoldItem($order)
    {
        SoldProduct::create([
            'product'  => $order->product,
            'quantity' => $order->quantity,
            'buyer'    => $order->person,
        ]); 
    }
}