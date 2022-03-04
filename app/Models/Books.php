<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Books extends Model
{

    protected $connection = 'mongodb';
    protected $collection = 'library_books';
    protected $guarded = [];
}
