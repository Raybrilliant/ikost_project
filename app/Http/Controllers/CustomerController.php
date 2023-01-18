<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function show()
    {
        $data = Customer::all();
        return view('admin/customer', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $data = [
            'nama' => $request->nama,
            'tipe_kamar' => $request->tipe_kamar,
            'nomor_kamar' => $request->nomor_kamar,
            'biaya_kamar' => $request->biaya_kamar,
        ];
        Customer::create($data);
        return redirect('admin/customer');
    }

    public function delete(Request $request)
    {
        Customer::destroy($request->id);
        return redirect('admin/customer');
    }
}
