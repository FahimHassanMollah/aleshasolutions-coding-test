<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class OrderService
{
    /**
     * @param int|null $paginate
     * @param string|null $searchByCustomerName
     * @param string|null $dateFrom
     * @param string|null $dateTo
     * @param int|null $status
     * @param bool $withCustomerRelation
     * @return LengthAwarePaginator|Collection|null
     */
    public static function orders(int $paginate =null, string $searchByCustomerName = null, string $dateFrom = null, string $dateTo = null, int $status = null, bool $withCustomerRelation = true)
    {
        $orders = Order::query();
        if ($searchByCustomerName){
            $orders->whereHas('customer', function ($query) use ($searchByCustomerName){
               $query->where('customers.name', 'LIKE', "%$searchByCustomerName%");
            });
        }
        if ($dateFrom){
            $date = date_format(strtotime($dateFrom), 'Y-m-d');
            $orders->where('created_at', '>=', $date);
        }
        if ($dateTo){
            $date = date_format(strtotime($dateTo), 'Y-m-d');
            $orders->where('created_at', '<=', $date);
        }
        if ($status){
            $orders->where('status', $status);
        }
        $orders->OrderBy('created_at', 'desc');
        if ($withCustomerRelation){
            $orders->with(['customer']);
        }
        if ($paginate){
            return $orders->paginate($paginate);
        }
        return $orders->get();

    }
    /**
     * Store Order.
     * @param int $customerId
     * @param int $transactionType
     * @param int $payStatus
     * @param array $details
     * @param float $total
     * @param int $status
     * @return Order
     */
    public static function store(int $customerId, int $transactionType, int $payStatus, array $details, float $total, int $status = 0): Order
    {
        $order = new Order();
        $order->customer_id         = $customerId;
        $order->transaction_type    = $transactionType;
        $order->pay_status          = $payStatus;
        $order->details             = json_encode($details);
        $order->total               = $total;
        $order->pay_status          = $status;
        $order->save();
        return $order;
    }

    /**
     * check order is clean or not.
     * @param int $orderId
     * @param int $status
     * @return bool
     */
    public static function isOrderClean(int $orderId, int $status): bool
    {
        $order = Order::find($orderId)->fill(['status' => $status]);
        if ($order->isClean()){
            return true;
        }
        return false;
    }

    /**
     * Update order
     * @param int $orderId
     * @param int $status
     * @return Order
     */
    public static function update(int $orderId, int $status): Order
    {
        $order = Order::find($orderId)->fill(['status' => $status]);
        $order->save();
        return $order;
    }
}
