<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
	use Sortable;

    protected $fillable = [
    	'code',
    	'details'
    ];

    public $sortable = [
		'code',
    	'details'
	];

}
