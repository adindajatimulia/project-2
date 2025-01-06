<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Vinkla\Hashids\Facades\Hashids;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'breadcrumbs' => [
                [
                    'title' => 'Dashboard',
                ],
                [
                    'title' => 'Index',
                ],
            ],
        ];
        return view('admins.dashboard.index', $data);
    }
    

}
