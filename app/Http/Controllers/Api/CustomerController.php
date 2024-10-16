<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    public function show(Customer $customer)
    {
        return response()->json($customer);
    }

    public function destroy(Customer $customer)
    {
        if ($customer->image) {
            Storage::delete($customer->image);
        }
        $customer->delete();
        return response()->json(['message' => 'Xóa dữ liệu thành công']);
    }
}
