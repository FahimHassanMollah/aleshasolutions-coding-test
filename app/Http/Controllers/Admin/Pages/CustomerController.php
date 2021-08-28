<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Services\CustomerService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function index(Request $request): View
    {
        $searchText = $request->search;
        $customers = CustomerService::customers(20, $searchText, );
        return view('pages.admin.customers.index')
            ->with(['customers' => $customers]);
    }
}
