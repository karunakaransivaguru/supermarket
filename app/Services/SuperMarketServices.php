<?php

namespace App\Services;
use App\Http\Controllers\Controller\SuperMarketController;
class SuperMarketServices
{
  /*
   @functionname : calculateItemTotal
   @response : string
   @Authorname : Karunakaran
   */
    public function calculateItemTotal($itemCode = 0 , $quantity = 0 , $specialOffers = 0 , $quantity_E = 0 )
        {
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
                return  $Item_A_price;
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
              return  $Item_B_price;
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
              return  $Item_C_price;
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
                return  $Item_D_price;
                break;
            default:
              return "Invalid Item Code" ;
          }
    
        }
}
