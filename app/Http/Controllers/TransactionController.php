<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Transaction',
            'breadcrumbs' => [
                [
                    'title' => 'Dashboard',
                ],
                [
                    'title' => 'Transaction',
                ],
            ],
            'mods' => 'transactions',
        ];
        return view('admins.transaction.index', $data);
    }

    public function getData()
    {
        return DataTables::of(Order::with('customer', 'table')->get())->make();
    }
}
