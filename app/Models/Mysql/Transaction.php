<?php

namespace App\Models\Mysql;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $connection = 'mysql';
	protected $table = 'transaction';

    protected $primaryKey = 'id_transaction';

    protected $fillable = [
        'id_transaction',
        'uuid_transaction',
        'id_store',
        'date',
        'hour',
        'total'
    ];

    public function store()
    {
        return $this->belongsTo('App\Models\Mysql\Store');
    }
}
