<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::query()->latest('id')->paginate(8);
        return view('index', compact('customers'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:customers'],
            'phone' => ['required', 'unique:customers'],
            'address' => ['nullable', 'required'],
            'is_active' => ['nullable'],
            'image' => ['required', 'image', 'max:2048'],
        ]);

        $data['is_active'] = $request->input('is_active') ?? 0;
        $data['image'] = $this->fileUpload($request, 'image');

        Customer::query()->create($data);

        return redirect()->route('customers.index');
    }

    //fileUpload
    public function fileUpload(Request $request, $filename)
    {
        if ($request->hasFile($filename)) {
            return $request->file($filename)->store('images');
        }
        return null;
    }
}
