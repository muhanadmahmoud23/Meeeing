<?php

namespace App\Traits;

use App\Models\Items;

trait DiscountTrait
{

    public function ShoesDisount($price, $total, $discountArray)
    {
        $discountShoes = ($price * 10) / 100;
        $total -= $discountShoes;
        $discountText = '10% off shoes:   - $' . (string)$discountShoes;
        array_push($discountArray, $discountText);

        return ['total' => $total, 'discountArray' => $discountArray, 'discountShoes' => $discountShoes];
    }

    public function ItemsNumberDiscount($shipping, $total, $discountArray)
    {
        $discountShipping = ($shipping * 10) / 100;
        if ($discountShipping > 10) {
            $discountShipping = 10;
        }
        $total -= $discountShipping;
        $discountShippingText = '10% off Shipping:   - $' . (string)$discountShipping;
        array_push($discountArray, $discountShippingText);

        return ['total' => $total, 'discountArray' => $discountArray, 'discountShipping' => $discountShipping];
    }

    public function JacketDiscount($total, $discount)
    {
        $price = Items::where('type', 'jacket')->get()->pluck('price');
        $disountJacketValue = ($price[0] * 50) / 100;
        $total -= $disountJacketValue;
        $disountJacketText = '50% off jacket:   - $' . (string)$disountJacketValue;
        array_push($discount, $disountJacketText);

        return ['total' => $total, 'discount' => $discount, 'disountJacketValue' => $disountJacketValue];
    }
}
