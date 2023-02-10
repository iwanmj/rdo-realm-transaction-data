<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TransactionController extends Controller
{
	public function index(Request $request)
	{
		return view('transaction');
	}
	
}
