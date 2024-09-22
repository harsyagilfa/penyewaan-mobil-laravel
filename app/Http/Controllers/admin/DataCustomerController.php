<?php

namespace App\Http\Controllers\admin;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataCustomerController extends Controller
{
    public function index()
    {
        $customer_get = Customer::all();
        return view('admin.data_customer',['customer_get' => $customer_get]);
    }
    public function detail($id)
    {
        $customer = Customer::findOrFail($id);
        return view('admin.detail_customer',compact('customer'));
    }
}
