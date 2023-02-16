<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Mongo\MongoTransaction;
use App\Models\Mysql\Transaction;
use App\Models\Mysql\Store;
use Carbon\Carbon;

class GetDataTransRealm extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:get-data-trans-realm';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Realm Data Trans';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $dataTrans = MongoTransaction::raw(function ($collection) {
			return $collection->aggregate([
				[
					'$group' => [
						'_id' => [
							'_partition' => '$_partition',
							'outlet' => '$outlet', 
							'year' => ['$year' => '$createdAt'], 
							'month' => ['$month' => '$createdAt'], 
							'day' => ['$dayOfMonth' => '$createdAt'], 
							'hour' => ['$hour' => '$createdAt']
						], 
						'count' => [
							'$sum' => 1
						]
					]
				]
			]);
		});
		// print_r($dataTrans); exit;
		foreach($dataTrans as $trans){
			$partition = isset($trans->_id->_partition) ? $trans->_id->_partition : '0';
			$store_name = isset($trans->_id->outlet) ? $trans->_id->outlet : '';
			$date = $trans->_id->year.'-'.sprintf("%02d", $trans->_id->month).'-'.sprintf("%02d", $trans->_id->day);

			if (!Store::where('uuid_store', '=', $partition)->exists()) {
				Store::create([
					'uuid_store' => $partition,
					'store_name' => $store_name
				]);
			}

            Transaction::create([
				'uuid_transaction' => $partition,
				'id_store' => $partition,
				'date' => $date,
				'hour' => sprintf("%02d", $trans->_id->hour),
				'total' => $trans->count
			]);
        }

    }
}
