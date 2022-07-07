<?php

namespace App\Traits;

use App\Models\Orders;
use App\Models\Carts;

trait DataBaseTrait
{

    public function OrderTableCreateDB($order ,$subtotal, $shipping, $vat, $totalDiscount, $total)
    {
        $order->subtotal = 0;
        $order->shipping = 0;
        $order->vat = 0;
        $order->discount = 0;
        $order->total =  0;
        $order->save();

        return $order;
    }

    public function OrderTableUpdateDB($order ,$subtotal, $shipping, $vat, $totalDiscount, $total)
    {
        $order->subtotal = $subtotal;
        $order->shipping = $shipping;
        $order->vat = $vat;
        $order->discount = $totalDiscount;
        $order->total =  $total;
        $order->Update();
    }

    public function CartTableCreateDB($type, $country, $price, $weight, $rate, $shipping, $vat, $orders_id)
    {
        Carts::create([
            'orders_id'  => $orders_id,
            'type' => $type,
            'country' => $country,
            'price' => $price,
            'weight' => $weight,
            'rate' => $rate,
            'shipping' => $shipping,
            'vat' => $vat,
        ]);
    }
}
