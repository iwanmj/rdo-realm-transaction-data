<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Mysql\Store;
use App\Models\Mysql\Transaction;
use App\Models\Mongo\MongoTransaction;

class TransactionController extends Controller
{
	public function index(Request $request)
	{
		$dataStore = Store::whereNotNull('uuid_store')
            ->get();
		return view('transaction',[
			'dataStore' => $dataStore
		]);
	}

	public function detail($uuid_store=null)
	{
		$dataTrans = DB::table('transaction')
		->where('uuid_transaction', $uuid_store)
		->join('store', 'store.uuid_store', '=', 'transaction.id_store')
		->select('transaction.*', 'store.store_name')
		->get();
		
		return view('detail',[
			'dataTrans' => $dataTrans
		]);
	}
	
}
