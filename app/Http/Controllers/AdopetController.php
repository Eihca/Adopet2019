<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class AdopetController extends Controller
{
    public function index(){
		return view('adopet.tryindex');
	}
	public function petpage(){
		$cats = DB::table('pets')->select('*')->where('pet_class', 'Cat')->get();
		
		$dogs = DB::table('pets')->select('*')->where('pet_class', 'Dog')->get();
		/*$hams = DB::table('pets')->select('*')->where('pet_class', 'Hamster')->get();
		$birds = DB::table('pets')->select('*')->where('pet_class', 'Bird')->get();
		$turts = DB::table('pets')->select('*')->where('pet_class', 'Turtle')->get();
		$fish = DB::table('pets')->select('*')->where('pet_class', 'Fish')->get();*/

		return view('adopet.PetPage', compact('cats','dogs'/*,'hams','birds','turts', 'fish'*/));
	}
	public function cart(){
		return view('adopet.petcart');
	}
	
	public function add($id){
		
	}
	
	public function rmv(){
		
	}
}
