<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\CalculatePrize;
use Validator;
class SuperMarketController extends Controller
{
    /*
    @functionname : index
    @response     : html
    */
    public function index(Request $request)
    {
      return view('supermarket');
    }

    /*
   @functionname : calculateItemTotal
   @response     : array
   @Authorname   : Karunakaran
   */
  public function calculateItemTotal(Request $request)
  {
    $validator = Validator::make($request->all(),[ 
        'itemcode' => 'required',
        'quantity' => 'required',
    ]);

    if($validator->fails()) {
        return redirect()->back()->withErrors($validator); 
      } 
    $itemCode  = ( $request->itemcode ) ? $request->itemcode : 0;
    $quantity  = ( $request->quantity ) ? $request->quantity : 0;

    $response = CalculatePrize::getPriceDetails($itemCode);
    $specialOffers = $specialQuantity = 0 ;
    $temp_array = array();
    foreach ( $response as $key => $value )
    { 
        $temp_array[$key] ['itemCode']        = $value->ItemCode;
        $temp_array[$key] ['specialOffers']   = $value->SpecialOffer;
        $temp_array[$key] ['specialQuantity'] = $value->Quantity;
        $temp_array[$key] ['unitPrice']       = $value->UnitPrice;
        $temp_array[$key] ['specialPrice']    = $value->SpecialPrize ;
    }
   foreach($temp_array as $tmpkey => $tmpval)
   {
     $specialOffers    = $tmpval['specialOffers'];
     $specialQuantity  = $tmpval['specialQuantity'];
     $specialPrice     = $tmpval['specialPrice'];
     $unitPrice        = $tmpval['unitPrice'];
     if($itemCode  == "A")
     {
        if($specialOffers && $quantity >= $specialQuantity)
          {
              $spl_quantity_remain  =  $quantity % $specialQuantity ;
              $spl_quantity_no  =  floor($quantity / $specialQuantity) ;
              $tmp_no_total_price = $spl_quantity_no * $specialPrice ;
              $tmp_spl_total_price = $spl_quantity_remain * $unitPrice ;
              $Item_price = $tmp_no_total_price + $tmp_spl_total_price;
          }
          else
          {
            $Item_price = $unitPrice * $quantity;  
          }
    }
    if($itemCode  == "B")
    {
        if($specialOffers && $quantity >= $specialQuantity)
          {
              $spl_quantity_remain  =  $quantity % $specialQuantity ;
              $spl_quantity_no  =  floor($quantity / $specialQuantity) ;
              $tmp_no_total_price = $spl_quantity_no * $specialPrice ;
              $tmp_spl_total_price = $spl_quantity_remain * $unitPrice ;
              $Item_price = $tmp_no_total_price + $tmp_spl_total_price;
          }
          else
          {
            $Item_price = $unitPrice * $quantity;  
          }
    }   
    if($itemCode  == "C")
    {
        if($specialOffers && $quantity == 1)
        { 
          $Item_price =  $unitPrice * $quantity;
          break;
        }
        if($specialOffers && $quantity >= $specialQuantity)
        {  
            $spl_quantity_remain  =  $quantity % $specialQuantity ;
            $spl_quantity_no  =  floor($quantity / $specialQuantity) ;
            $tmp_no_total_price = $spl_quantity_no * $specialPrice ;
            $tmp_spl_total_price = $spl_quantity_remain * $unitPrice ;
            $Item_price = $tmp_no_total_price + $tmp_spl_total_price;
        }
    }
    if($itemCode  == "E")
    {
       $Item_price = $unitPrice * $quantity;  
    }  
   }
   return redirect()->back()->with('success', $request->itemcode. ' item  of '.$request->quantity.'  quantity  amount is = '.$Item_price );   
  }

}
