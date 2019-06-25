<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Goods;

class Cart extends Model
{
    //
    public $item = null;
    public $amounts = 0;
    public $cost = 0;
    public function __construct($oldCart){
    	if($oldCart){
    		$this->item = $oldCart->item;
    		$this->amounts = $oldCart->amounts;
    		$this->cost = $oldCart->cost;
    	}
    }
    public function getAllItems(){
        $proArr = array();
        foreach($this->item as $key => $values)
            $proArr[] = $values;
        return $proArr;
    }    
    public function add($item, $id){        
        if($item->discount!=0){
            $gh =['amounts'=>0,'price'=>$item->discount,'item'=>$item];
        }else $gh =['amounts'=>0,'price'=>$item->price,'item'=>$item];
        if($this->item){
            if(array_key_exists($id,$this->item)){
                $gh = $this->item[$id];
            }
        }
        $gh['amounts']++;
        if($item->discount!=0){
            $gh['price'] = $item->discount * $gh['amounts'];
            $this->cost += $item->discount;
        }else {
            $gh['price'] = $item->price * $gh['amounts'];     
            $this->cost += $item->price;
            }   
        $this->item[$id] = $gh;
        $this->amounts ++;      
    }
    public function addHasAmounts($item, $id,$amounts){   
        
        if($item->discount!=0){
            $gh =['amounts'=>0,'price'=>$item->discount,'item'=>$item];
        }else $gh =['amounts'=>0,'price'=>$item->price,'item'=>$item];
        if($this->item){
            if(array_key_exists($id,$this->item)){
                $gh = $this->item[$id];
            }
        }
        $gh['amounts']+= $amounts;
        if($item->discount!=0){
            $gh['price'] = $item->discount * $gh['amounts'];
            $this->cost += $gh['price'];
        }else {
            $gh['price'] = $item->price * $gh['amounts'];     
            $this->cost += $gh['price'];
            }   
        $this->item[$id] = $gh;
        $this->amounts += $amounts;
        
    }
    public function removeOne($id){
        $this->item[$id]['amounts']--;
        $this->item[$id]['price']-= $this->item[$id]['item']['price'];
        $this->amounts--;
        $this->cost-= $this->item[$id]['item']['price'];
        if($this->item[$id]['amounts']<=0){
            unset($this->item[$id]);
        }

    }
    public function removeProduct($id){
        $this->amounts-= $this->item[$id]['amounts'];
        $this->cost-= $this->item[$id]['price'];
        unset($this->item[$id]);
    }

}
