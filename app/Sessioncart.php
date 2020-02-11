<?php
namespace App;

class Sessioncart
{
   public $items=null;
   public $totalQty=0;
   public $totalPrice=0;

   public function __construct($oldCart)
   {
       if($oldCart)
       {   
        $this->items=$oldCart->items;
        $this->totalQty=$oldCart->totalQty;
        $this->totalPrice=$oldCart->totalPrice;       

       }

   }

   public function add($item,$size,$id,$qty,$price,$key='')
   {
        $storedItem = ['qty'=>$qty,'current_price'=>$price,'size'=>$size,'fit'=>$item['prdct_fit'],'item'=>$item,'price'=>$price/$qty]; 

               
         if($this->items)
         {
          if(array_key_exists($key, $this->items) && $key!=''){

            $storedItem = $this->items[$key];
           
            $this->items[$key] = $storedItem;
            $this->totalPrice -=$storedItem['current_price'];           
            $this->totalQty -= $storedItem['qty'];

            // $storedItem['qty'] = $qty;
            // $storedItem['current_price'] = $price;
           // $storedItem['price'] = $storedItem['current_price']/$storedItem['qty'];
            $this->items[$key]['qty']=$qty;
            $this->items[$key]['current_price']=$price;
            $this->items[$key]['price']=$price/$qty;

            



         }
         else{
             $storedItem['qty'] = $qty;
            $storedItem['current_price'] = $price;
            $storedItem['price'] = $price/$qty;
            $this->items[rand()] = $storedItem;          
         }
          
        }
        else{


            $storedItem['qty'] = $qty;
            $storedItem['current_price'] = $price;
            $storedItem['price'] = $price/$qty;
            $this->items[rand()] = $storedItem;
            // $this->items[rand()]['qty']=$qty;
            // $this->items[rand()]['price']=$price;
             
        }
         // echo  $this->totalPrice;
         //  echo $this->totalQty;
         $this->totalPrice += $price;
         $this->totalQty +=  $qty;           

        

       
     // echo $storedItem['price'];
     //   echo "<pre>";
     //   print_r($this);
     //   die();
         
       
                 
        
       // $this->totalPrice += $price;
      
        
   }
}