<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdopetController extends Controller
{
    public function index(){
		return view('adopet.tryindex');
	}
	public function pets(){
		return view('adopet.Petpage');
	}
	public function cart(){
		return view('adopet.petcart');
	}
}
