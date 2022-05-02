<?php

namespace App\Services;
use App\Http\Controllers\Controller\SuperMarketController;
use App\Models\Price;
class CalculatePrize
{
     public static function getPriceDetails($code)
     {
         $price_details = Price::where('ItemCode',$code)->get();
         return !empty($price_details) ? $price_details : [];
     }
}    