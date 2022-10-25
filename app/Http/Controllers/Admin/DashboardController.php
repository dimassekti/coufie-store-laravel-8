<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $customer = User::count();
        $transaction = Transaction::where('transaction_status', 'SUCCESS')->sum('total_price');
        $revenue = Transaction::count();
        return view('pages.admin.admin-dashboard', [
            'customer' => $customer,
            'transaction' => $transaction,
            'revenue' => $revenue
        ]);
    }
}
