<?php

namespace App\Services;

use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class CustomerService
{
    public static function customers(int $paginate = null, string $searchString = null, int $status = null)
    {
        $customers = Customer::query();
        if ($searchString){
            $customers->where(function ($query) use ($searchString){
                $query->where('name', 'LIKE', "%$searchString%")
                    ->orWhere('email', 'LIKE', "%$searchString%")
                    ->orWhere('address', 'LIKE', "%$searchString%")
                    ->orWhere('phone', 'LIKE', "%$searchString%");
            });
        }
        if ($status){
            $customers->where('status', $status);
        }

        if ($paginate){
            return $customers->paginate($paginate);
        }
        return $customers->get();
    }

    /**
     * Check Customer is existed or not.
     * @param string $email
     * @return bool
     */
    public static function checkCustomerExist(string $email): bool
    {
        $customer = Customer::where('email', $email)->first();
        if (!$customer){
            return false;
        }
        return true;
    }

    /**
     * generate password;
     * @return string
     */
    public static function randomPassword(): string
    {
        return substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789') , 0 , 10 );
    }

    /**
     * Create a nuw customer.
     * @param string $name
     * @param string $email
     * @param string $phone
     * @param string $address
     * @return Customer
     */
    public static function store(string $name, string $email, string $phone, string $address, string $password): Customer
    {

        $customer = new Customer();
        $customer->name     = $name;
        $customer->email    = $email;
        $customer->phone    = $phone;
        $customer->address  = $address;
        $customer->password = Hash::make($password);
        $customer->status   = 1;
        $customer->save();
        return $customer;
    }

    /**
     * get Customer by Email.
     * @param $email
     * @return Customer
     */
    public static function customer($email): Customer
    {
        return Customer::where('email', $email)->first();

    }
}
