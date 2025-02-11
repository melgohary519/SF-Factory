<?php

use App\Http\Controllers\PrintInvoice as ControllersPrintInvoice;
use App\Livewire\Print\PrintInvoice;
use App\Livewire\ProfitsLosses\MaterialReportPage;
use App\Livewire\ProfitsLosses\ProfitLossPage;
use App\Livewire\ProfitsLosses\ProfitReportPage;
use App\Livewire\ProfitsLosses\SuplierAndTraderAccountPage;
use App\Livewire\ProfitsLosses\SuplierAndTraderProfitPage;
use App\Livewire\ProfitsLosses\SupplierAccountPage;
use App\Livewire\ProfitsLosses\SupplierProfitPage;
use App\Livewire\ProfitsLosses\TraderAccountPage;
use App\Livewire\ProfitsLosses\TraderProfitPage;
use App\Livewire\Transfers\ListTransfers;
use App\Livewire\Transfers\AddTransfer;
use App\Livewire\Transfers\TransferAccountDetails;
use App\Livewire\Transfers\TransferAccountPage;
use App\Livewire\ViewInvoice\Expenses;
use App\Livewire\ViewInvoice\Purchase;
use App\Livewire\ViewInvoice\Sales;
use App\Livewire\ViewInvoice\Transfers;
use App\Models\Supplier;
use Illuminate\Support\Facades\Route;

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::get('/logout', function () {
    Auth::logout();  
    return redirect('/');
})->name('logout');

Route::get('/login', \App\Livewire\Users\Login::class)->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/', \App\Livewire\Pages\HomePage::class);
    Route::get('/items/add', \App\Livewire\Items\AddItem::class)->name("items.add");
    Route::get('/items', \App\Livewire\Items\ListItems::class)->name("items.list");
    Route::get('/expenses', \App\Livewire\Expenses\AddExpense::class)->name("expenses.add");

    Route::get('/suppliers', \App\Livewire\Suppliers\Listsuppliers::class)->name("suppliers.list");
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


    Route::get('/users/list', \App\Livewire\Users\ListUsers::class)->name('users.list');
    Route::get('/users/add', \App\Livewire\Users\AddUser::class)->name('users.add');
    Route::get('/users/account/{user_id}', \App\Livewire\Users\UserِAccount::class)->name('users.account');

    Route::get('/profits-losses', ProfitLossPage::class)->name('profitlosses.page');
    Route::get('/profit/{type}', SuplierAndTraderProfitPage::class)->name('profitlosses.supplierandtrader.profit');
    Route::get('/account/{type}', SuplierAndTraderAccountPage::class)->name('profitlosses.supplierandtrader.account');
    Route::get('/material-report', MaterialReportPage::class)->name('profitlosses.material.report');
    Route::get('/profit-report', ProfitReportPage::class)->name('profitlosses.profit.report');

    // view incoices
    Route::get('/invoices/purchase/{invoice}', Purchase::class)->name('view.invoices.purchase');
    Route::get('/invoices/sales/{invoice}', Sales::class)->name('view.invoices.sales');
    Route::get('/invoices/trensfer/{invoice}', Transfers::class)->name('view.invoices.transfer');
    Route::get('/invoices/expenses/{invoice}', Expenses::class)->name('view.invoices.expenses');

    // print invoices
    Route::get('/print/invoices/purchase/{invoice}', \App\Livewire\PrintInvoice\Purchase::class)->name('print.invoices.purchase');
});

Route::get('/test', function () {
    dd(Supplier::first()->invoices()->get());
    return view('welcome');
});
Route::get('/home', function () {
    return redirect('/');
});


