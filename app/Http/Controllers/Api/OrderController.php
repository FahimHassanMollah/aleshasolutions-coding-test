<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\CustomerSignup;
use App\Mail\NewOrderPlaced;
use App\Services\CustomerService;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function store(Request $request){
        $requestCustomer       = $request->customer;
        $requestCart           = $request->cart;
        $requestOrderDetails   = $request->order_details;

        $customerName           = $requestCustomer['name'];
        $customerEmail          = $requestCustomer['email'];
        $customerPhone          = $requestCustomer['phone'];
        $customerAddress        = $requestCustomer['address'];

        $orderTransactionType   = $requestOrderDetails['paymentMethod'];
        $orderShippingType      = $requestOrderDetails['shippingMethod'];
        $orderAdditionalNote    = $requestOrderDetails['additionalNote'];
        $orderDiscount          = $requestOrderDetails['discount'];
        $orderDeliveryCharge    = $requestOrderDetails['deliveryCharge'];
        $orderSubtotal          = $requestOrderDetails['subtotal'];
        $orderTotal             = $requestOrderDetails['total'];
        $orderStatus            = 0; // pending.
        $orderPayStatus         = 0; // unpaid.

        $productDetails = [];
        foreach ($requestCart as $item){
            $product = [
                'id'    => $item['id'],
                'image'     => $item['image'][0] ?? null,
                'name'  => $item['name'],
                'price' => $item['price'] ?? 0.00,
                'quantity'  => $item['quantity'] ?? 0,
                'subtotal'  => $item['price'] ?? 0.00 * $item['quantity'] ?? 0,
            ];
            array_push($productDetails, $product);
        }

        $orderDetails['items']                         = $productDetails;
        $orderDetails['discount']                      = $orderDiscount;
        $orderDetails['delivery_charge']               = $orderDeliveryCharge;
        $orderDetails['subtotal']                      = $orderSubtotal;
        $orderDetails['total']                         = $orderDetails['subtotal'];
        $orderDetails['additional_note']               = $orderAdditionalNote;
        $orderDetails['shipping_method']               = $orderShippingType;
        $orderDetails['payment_method']                = $orderTransactionType;

        $customer = CustomerService::checkCustomerExist($customerEmail);
        if (!$customer){
            $password = CustomerService::randomPassword();
            $customer = CustomerService::store($customerName, $customerEmail, $customerPhone, $customerAddress, $password);
            Mail::to($customer->email)->send(new CustomerSignup($customer, $password));

//            try {
//                Mail::to($customer->email)->send(new CustomerSignup($customer['customer'], $customer['password']));
//            } catch (\Throwable $exception){
//                return response()->json(['status' => 'error', 'message' => $exception->getMessage()], $exception->getCode());
//            }
        } else{
            $customer = CustomerService::customer($customerEmail);
        }


        $orderTransaction = $orderTransactionType == 'cash' ? 0 : 1;
        $order = OrderService::store($customer->id, $orderTransaction, $orderPayStatus, $orderDetails, $orderTotal, $orderStatus);
        Mail::to($customer->email)->send(new NewOrderPlaced($order, $customer));

//        try {
//            Mail::to($customer->email)->send(new NewOrderPlaced($order, $customer));
//        } catch (\Throwable $exception){
//            return response()->json(['status' => 'error', 'message' => $exception->getMessage()], $exception->getCode());
//        }

        return response()->json(['status' => 'success', 'message' => 'Order placed.', 'order' => $order]);
    }
}
