<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Invoice extends Model
{
	use Sortable;

	protected $fillable = [
		'client_id',
		'notes',
		'status',
		'amount_charged',
		'hst',
		'sub_total',
		'wsib',
		'income_taxes',
		'total_deductions',
		'total',
		'invoiced_at',
		'paid_at'
	];

	public $sortable = [
		'id',
		'status',
		'created_at',
		'amount_charged',
		'hst',
		'sub_total',
		'wsib',
		'income_taxes',
		'total_deductions',
		'total',
		'invoiced_at',
		'paid_at'
	];

	protected $dates = [
		'created_at',
		'updated_at',
		'deleted_at',
		'invoiced_at',
		'paid_at'
	];

	// public function getHST() {
	// 	return number_format((float)$this->amount_charged * 0.13, 2, '.', ' ');
	// }

	// public function getTotal() {
	// 	$result = DB::table('invoices')->selectRaw('sum(hst)')->get();
	// 	return $result;
	// }

	// public function getWSIB() {
	// 	return $this->amount_charged * 0.06;
	// }

	// public function getIncomeTaxes() {
	// 	return $this->amount_charged * 0.26;
	// }

	// public function getSubTotal() {
	// 	return number_format((float)$this->amount_charged + $this->hst, 2, '.', ' ');		
	// }

	// public function getTotalDeductions() {
	// 	return number_format((float)$this->wsib + $this->income_taxes, 2, '.', ' ');

	// }

	// public function getNetTotal() {
	// 	return number_format((float)$this->amount_charged - $this->wsib - $this->income_taxes, 2, '.', ' ');
	// }

	// An invoice belongs to a client
	public function client()
	{
		return $this->belongsTo('App\Client');
	}

	// An invoice has many items
	public function invoiceItems() {
		return $this->hasMany('App\InvoiceItem')->orderBy('id','desc');
	}

}
