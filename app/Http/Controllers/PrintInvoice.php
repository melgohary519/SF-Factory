<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrintInvoice extends Controller
{
    function InvoiceDetails($type,$id) {
        return view("print.print-invoice");
    }
}
