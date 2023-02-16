<?php

namespace App\Models\Mongo;

use Jenssegers\Mongodb\Eloquent\Model;

class MongoTransaction extends Model
{
    protected $collection = 'transactions';
    protected $connection = 'mongodb';
}
