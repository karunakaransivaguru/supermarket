<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperMarketController extends Controller
{
  /*
   @functionname : calculateItemTotal
   @response : json
   @Authorname : Karunakaran
   */
    public function calculateItemTotal(Request $request)
        {
          $data = [];
          $itemCode  = ( $request->itemcode ) ? $request->itemcode : 0;
          $quantity  = ( $request->quantity ) ? $request->quantity : 0;
          $itemCode_E  = ( $request->itemcode_E ) ? $request->itemcode_E : 0;
          $quantity_E  = ( $request->quantity_E ) ? $request->quantity_E : 0;
          $specialOffers  = ( $request->specialOffers ) ? 1 : 0;
          if(empty($itemCode))
          {
            $data['message'] = "ItemCode is Missing.." ;
            $data['status']  = false;
            return  json_encode($data);
          }
          if(!$quantity)
          {
            $data['message'] = "Quantity is Missing.." ;
            $data['status']  = false;
            return  json_encode($data);
          }
          switch ($itemCode) {
            case "A":
              $item_A_UnitPrice       = 50;
              $item_A_specialQuantity = 3 ;
              $item_A_SpecialPrize    = 130 ;
              if($specialOffers && $quantity >= $item_A_specialQuantity)
                {
                    $spl_quantity_remain  =  $quantity % $item_A_specialQuantity ;
                    $spl_quantity_no  =  floor($quantity / $item_A_specialQuantity) ;
                    $tmp_no_total_price = $spl_quantity_no * $item_A_SpecialPrize ;
                    $tmp_spl_total_price = $spl_quantity_remain * $item_A_UnitPrice ;
                    $Item_A_price = $tmp_no_total_price + $tmp_spl_total_price;
                }
                else
                {
                  $Item_A_price = $item_A_UnitPrice * $quantity;  
                }
                $data['message'] = "success.." ;
                $data['status']  = true;
                $data['price']  = $Item_A_price;
                return  json_encode($data);
                break;
            case "B":
              $item_B_UnitPrice       = 30;
              $item_B_specialQuantity = 2 ;
              $item_B_SpecialPrize    = 45 ;
              if($specialOffers && $quantity >= $item_B_specialQuantity)
              {
                  $spl_quantity_remain  =  $quantity % $item_B_specialQuantity ;
                  $spl_quantity_no  =  floor($quantity / $item_B_specialQuantity) ;
                  $tmp_no_total_price = $spl_quantity_no * $item_B_SpecialPrize ;
                  $tmp_spl_total_price = $spl_quantity_remain * $item_B_UnitPrice ;
                  $Item_B_price = $tmp_no_total_price + $tmp_spl_total_price;
              }
              else
              {
                $Item_B_price = $item_B_UnitPrice * $quantity;  
              }
              $data['message'] = "success.." ;
              $data['status']  = true;
              $data['price']  = $Item_B_price;
              return  json_encode($data);
            break;
            case "C":
              $item_C_UnitPrice       = 20;
              $item_C_specialQuantity1 = 2 ;
              $item_C_specialQuantity2 = 3 ;
              $item_C_SpecialPrize1    = 38 ;
              $item_C_SpecialPrize2    = 50 ;
              if($specialOffers && $quantity >= $item_C_specialQuantity1 && $quantity < $item_C_specialQuantity2)
              {
                  $spl_quantity_remain  =  $quantity % $item_C_specialQuantity1 ;
                  $spl_quantity_no  =  floor($quantity / $item_C_specialQuantity1) ;
                  $tmp_no_total_price = $spl_quantity_no * $item_C_SpecialPrize1 ;
                  $tmp_spl_total_price = $spl_quantity_remain * $item_C_UnitPrice ;
                  $Item_C_price = $tmp_no_total_price + $tmp_spl_total_price;
              }else if($specialOffers && $quantity > $item_C_specialQuantity1 && $quantity >= $item_C_specialQuantity2)
              {
                  $spl_quantity_remain  =  $quantity % $item_C_specialQuantity2 ;
                  $spl_quantity_no  =  floor($quantity / $item_C_specialQuantity2) ;
                  $tmp_no_total_price = $spl_quantity_no * $item_C_SpecialPrize2 ;
                  $tmp_spl_total_price = $spl_quantity_remain * $item_C_UnitPrice ;
                  $Item_C_price = $tmp_no_total_price + $tmp_spl_total_price;
              }
              else
              {
                $Item_C_price =  $item_C_UnitPrice * $quantity;  
              }
              $data['message'] = "success.." ;
              $data['status']  = true;
              $data['price']  = $Item_C_price;
              return  json_encode($data);
              break;
              case "D":
                $item_D_UnitPrice       = 15;
                $item_E_UnitPrice       = 5;
               if($quantity > $quantity_E ){
                  $total_D_quantity = $quantity - $quantity_E;
                  $tmp_spl1_total_price  =  $quantity_E  * $item_E_UnitPrice;
                  $tmp_spl2_total_price  =  $total_D_quantity  * $item_D_UnitPrice ;
                  $Item_D_price = $tmp_spl1_total_price + $tmp_spl2_total_price;
                 }
                else
                {
                  $Item_D_price =  $item_D_UnitPrice * $quantity;  
                }
                $data['message'] = "success.." ;
                $data['status']  = true;
                $data['price']  = $Item_D_price;
                return  json_encode($data);
                break;
            default:
              $data['message'] = "Invalid Item Code" ;
              $data['status']  = false;
              $data['price']  = 0;
              return  json_encode($data);
          }
    
        }
}
