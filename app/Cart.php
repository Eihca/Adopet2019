<?php

namespace App;

class Cart
{
	public $items = null;
	public $totalqty = 0;
	public $totalPrice = 0;
	
	public function __construct($oldCart)
	{
		if ($oldCart){
			$this->items = $oldCart->items;
			$this->totalqty = $oldCart->totalqty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}
	
	public function add($item, $id){
		$storedItem = ['qty' => 0, 'price' => $item->pet_price, 'item' => $item];
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$storedItem = $this->items[$id];
			}
		}
		$storedItem['qty']++;
		$storedItem['price'] = $item->pet_price * $storedItem['qty'];
		$this->items[$id] = $storedItem;
		$this->totalqty++;
		$this->totalPrice += $item->pet_price;
	}
		
}	 