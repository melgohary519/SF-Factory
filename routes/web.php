<?php

use App\Http\Controllers\PrintInvoice as ControllersPrintInvoice;
use App\Livewire\Print\PrintInvoice;
use App\Livewire\Transfers\ListTransfers;
use App\Livewire\Transfers\AddTransfer;
use App\Livewire\Transfers\TransferAccountDetails;
use App\Livewire\Transfers\TransferAccountPage;
use App\Models\Supplier;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    dd(Supplier::first()->invoices()->get());
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', \App\Livewire\Pages\HomePage::class);
Route::get('/items/add', \App\Livewire\Items\AddItem::class)->name("items.add");
Route::get('/items', \App\Livewire\Items\ListItems::class)->name("items.list");
Route::get('/expenses', \App\Livewire\Expenses\AddExpense::class)->name("expenses.add");

Route::get('/suppliers', \App\Livewire\Suppliers\Listsuppliers::class)->name("suppliers.list");
Route::get('/suppliers/add', \App\Livewire\Suppliers\AddSupplier::class)->name("suppliers.add");

Route::get('/suppliers/add', \App\Livewire\Suppliers\AddSupplier::class)->name("suppliers.add");
Route::get('/suppliers/{supplier_id}', \App\Livewire\Suppliers\Supplieraccount::class)->name("suppliers.account");

Route::get('/purchase/invoice/add', \App\Livewire\Purchases\AddPurchaseInvoice::class)->name("purchase.invoice.add");
Route::get('/sales/invoice/add', \App\Livewire\Sales\AddSalesInvoice::class)->name("sales.invoice.add");
Route::get('/traders/add', \App\Livewire\Traders\AddTrader::class)->name("traders.add");
Route::get('/traders', \App\Livewire\Traders\ListTraders::class)->name("traders.list");
Route::get('/traders/{trader_id}', \App\Livewire\Traders\TraderAccount::class)->name("traders.account");

Route::get('/transfers', ListTransfers::class)->name('transfers.list');
Route::get('/transfers/add', AddTransfer::class)->name('transfers.add');
Route::get('/transfers/account', TransferAccountPage::class)->name('transfers.account');
Route::get('/transfers/account/details/{type}', TransferAccountDetails::class)->name('transfers.account.details');

// Route::get('/print/{type}/{id}', PrintInvoice::class)->name('print.invoice');
Route::get('/print/{type}/{id}', [ControllersPrintInvoice::class, 'InvoiceDetails'])->name('print.invoice');


