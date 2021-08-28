<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\DeleteOrderRequest;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{

    public function index(Request $request): View
    {
        $searchByCustomerName   = $request->customer_name;
        $dateFrom               = $request->date_from;
        $dateTo                 = $request->date_to;
        $orders = OrderService::orders('20',$searchByCustomerName, $dateFrom, $dateTo);
        return view('pages.admin.orders.index')->with(['orders' => $orders]);
    }

    public function show(Order $order): View
    {
        return view('pages.admin.orders.show')
            ->with(['order' => $order->load('customer')]);
    }

    public function update(Request $request, Order $order): RedirectResponse
    {
        $isOrderClean = OrderService::isOrderClean($order->id, $request->status);
        if ($isOrderClean){
            return back()->withMessage('Error! Must one value have to change on update.');
        }

        OrderService::update($order->id, $request->status);
        return back()->withMessage('Success! Data updated.');
    }

    public function destroy(DeleteOrderRequest $deleteOrderRequest): RedirectResponse
    {
        $selectedId = $deleteOrderRequest->selected_id;
        Order::destroy($selectedId);
        return redirect()->back()
            ->withMessage('Success! Data deleted.');
    }
}
