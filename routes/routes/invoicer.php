<?php

Route::get('invoicer/index',                 'InvoicerController@index')                  ->name('invoicer.index');
Route::get('invoicer/dashboard',             'InvoicerController@dashboard')              ->name('invoicer.dashboard');

Route::get('invoicer/ledger',                'LedgerController@index')        ->name('invoicer.ledger');
Route::get('invoicer/ledger/paid',           'LedgerController@paid')         ->name('invoicer.ledger.paid');
Route::get('invoicer/ledger/invoiced',       'LedgerController@invoiced')     ->name('invoicer.ledger.invoiced');
Route::get('invoicer/ledger/logged',         'LedgerController@logged')       ->name('invoicer.ledger.logged');

Route::get('invoicer/invoices/status_invoiced/{inv_id}',    'InvoicesController@status_invoiced')     ->name('invoices.status_invoiced');
Route::get('invoicer/invoices/status_paid/{inv_id}',        'InvoicesController@status_paid')         ->name('invoices.status_paid');
Route::get('invoicer/invoices/status_invoiced_all',         'InvoicesController@status_invoiced_all') ->name('invoices.status_invoiced_all');
Route::get('invoicer/invoices/status_paid_all',             'InvoicesController@status_paid_all')     ->name('invoices.status_paid_all');
Route::get('invoicer/invoices/paid',                        'InvoicesController@paid')                ->name('invoices.paid');
Route::get('invoicer/invoices/invoiced',                    'InvoicesController@invoiced')            ->name('invoices.invoiced');
Route::get('invoicer/invoices/logged',                      'InvoicesController@logged')              ->name('invoices.logged');
Route::get("invoicer/invoices/invoice_to_pdf/{inv_id}",     'InvoicesController@invoice_to_pdf')      ->name('invoices.invoice_to_pdf');

Route::get('invoicer/invoices/index',                       'InvoicesController@index')               ->name('invoicer.invoices.index');
Route::get('invoicer/invoices/create',                      'InvoicesController@create')              ->name('invoicer.invoices.create');
Route::post('invoicer/invoices/store',                      'InvoicesController@store')               ->name('invoicer.invoices.store');
Route::get('invoicer/invoices/{id}/show',                   'InvoicesController@show')                ->name('invoicer.invoices.show');
Route::get('invoicer/invoices/{id}/edit',                   'InvoicesController@edit')                ->name('invoicer.invoices.edit');
Route::put('invoicer/invoices/{id}',                        'InvoicesController@update')              ->name('invoicer.invoices.update');
Route::delete('invoicer/invoices/{id}',                     'InvoicesController@destroy')             ->name('invoicer.invoices.destroy');

Route::get('invoicer/clients/search',                       'ClientsController@search')               ->name('invoicer.clients.search');
Route::get('invoicer/clients/index',                        'ClientsController@index')                ->name('invoicer.clients.index');
Route::get('invoicer/clients/create',                       'ClientsController@create')               ->name('invoicer.clients.create');
Route::post('invoicer/clients/store',                       'ClientsController@store')                ->name('invoicer.clients.store');
Route::get('invoicer/clients/{id}/show',                    'ClientsController@show')                 ->name('invoicer.clients.show');
Route::get('invoicer/clients/{id}/edit',                    'ClientsController@edit')                 ->name('invoicer.clients.edit');
Route::put('invoicer/clients/{id}',                         'ClientsController@update')               ->name('invoicer.clients.update');
Route::delete('invoicer/clients/{id}',                      'ClientsController@destroy')              ->name('invoicer.clients.destroy');

Route::get('/invoicer/invoiceItems/create/{inv_id}',        'InvoiceItemsController@create')          ->name('invoicer.invoiceItems.create');
Route::resource('/invoicer/invoiceItems', 'InvoiceItemsController', ['except' => ['create','show']]);

Route::get('invoicer/products/search',                       'ProductsController@search')          	->name('invoicer.products.search');
Route::get('invoicer/products/index',                        'ProductsController@index')              ->name('invoicer.products.index');
Route::get('invoicer/products/create',                       'ProductsController@create')             ->name('invoicer.products.create');
Route::post('invoicer/products/store',                       'ProductsController@store')              ->name('invoicer.products.store');
Route::get('invoicer/products/{id}/show',                    'ProductsController@show')               ->name('invoicer.products.show');
Route::get('invoicer/products/{id}/edit',                    'ProductsController@edit')               ->name('invoicer.products.edit');
Route::put('invoicer/products/{id}',                         'ProductsController@update')             ->name('invoicer.products.update');
Route::delete('invoicer/products/{id}',                      'ProductsController@destroy')            ->name('invoicer.products.destroy');