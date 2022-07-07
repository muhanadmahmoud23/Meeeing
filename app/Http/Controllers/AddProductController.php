<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuyProductRequest;
use App\Traits\DiscountTrait;
use App\Traits\DataBaseTrait;
use App\Models\Items;
use App\Models\Rates;
use App\Models\Orders;

class AddProductController extends Controller
{
    use DiscountTrait;
    use DataBaseTrait;

    public function index()
    {
        return view('home', [
            'type'   => Items::all(),
            'country'   => Rates::all(),
        ]);
    }

    public function addproduct(BuyProductRequest $request)
    {
        $vat = 0;
        $total = 0;
        $subtotal = 0;
        $shipping = 0;
        $checkTshirt = 0;
        $chechBlouse = 0;
        $checkJacket = 0;
        $totalDiscount = 0;
        $discountArray = [];
        $order = new Orders;
        $orderEmptyCreate = $this->OrderTableCreateDB($order, $subtotal, $shipping, $vat, $totalDiscount, $total); // To Get Order Id In Cart

        for ($i = 0; $i < count($request->type); $i++) {
           
            $item = Items::where('id', $request->type[$i])->get()->first();
            $countryRate = Rates::where('id', $request->country[$i])->get()->first();

            $weight = $item->weight;
            $rate = $countryRate->rate;
            $type = $item->type;
            $price = $item->price;
            //Calucalte Each Item Values Before Checking Discounts

            $subtotal += $price;
            $shipping += ($weight / 0.1) * $rate;
            $vat += ($price * 14) / 100;

            // Check Shoes Discount
            // DiscountTrait 

            if ($type == 'shoes') {
                $ShoesDisount = $this->ShoesDisount($price, $total, $discountArray, $type);
                $discountArray = $ShoesDisount['discountArray'];
                $total = $ShoesDisount['total'];
                $totalDiscount += $ShoesDisount['discountShoes'];
            }

            // Check Jacket Discount

            $type == "tshirt" ? $checkTshirt = 1 : null;
            $type == "blouse" ? $chechBlouse = 1 : null;
            $type == "jacket" ? $checkJacket = 1 : null;


            //Create Database Table Cart For Each Item
            //DataBaseTrait

            $this->CartTableCreateDB($type, $countryRate->country, $price, $weight, $rate, ($weight / 0.1) * $rate, ($price * 14) / 100, $orderEmptyCreate['id']);
        }

        // Apply Jacket Discount If Needed
        // DiscountTrait

        if ($checkTshirt == 1 && $chechBlouse == 1  && $checkJacket == 1) {
            $JacketDiscount = $this->JacketDiscount($total, $discountArray);
            $discountArray = $JacketDiscount['discount'];
            $total = $JacketDiscount['total'];
            $totalDiscount += $JacketDiscount['disountJacketValue'];
        }

        // Check Item Number Discount If More Than 2 Items Make Discount On Shpping  
        // DiscountTrait 

        if (count($request->type) > 2) {
            $ItemsNumberDiscount = $this->ItemsNumberDiscount($shipping, $total, $discountArray);
            $discountArray = $ItemsNumberDiscount['discountArray'];
            $total = $ItemsNumberDiscount['total'];
            $totalDiscount += $ItemsNumberDiscount['discountShipping'];
        }

        //Calculate Total Price

        $total += $subtotal + $shipping + $vat;

        // Create Database Table Orders
        // DataBaseTrait 

        $this->OrderTableUpdateDB($order, $subtotal, $shipping, $vat, $totalDiscount, $total);

        return view('invoice', [
            'subtotal' => $subtotal,
            'shipping' => $shipping,
            'vat'      => $vat,
            'discountArray' => $discountArray,
            'total'    => $total,
        ]);
    }
}
