<?php

namespace App\Models\Mysql;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $connection = 'mysql';
	protected $table = 'store';

    protected $primaryKey = 'id_store';

    protected $fillable = [
        'uuid_store',
        'store_name'
    ];
}
