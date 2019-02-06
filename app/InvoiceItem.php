<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
	protected $table = 'invoiceItems';
	protected $dates = ['work_date'];

	protected $fillable = [
		'invoice_id',
		'product_id',
		'notes',
		'work_date',
		'quantity',
		'price',
		'total'
	];


	// public function getTotal() {
	// 	return $this->price * $this->quantity;
	// }

	// An item belongs to an invoice
	public function invoice()
	{
		return $this->belongsTo('App\Invoice');
	}

	public function product()
	{
		return $this->belongsTo('App\Product');
	}


}
