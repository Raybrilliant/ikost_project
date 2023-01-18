<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Payment;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class PaymentController extends Controller
{
    public function show(Request $request)
    {
        if (!$request->session()->get('email')) {
            return redirect('admin/login');
        }

        $data = DB::table('customers')->join('payments','customers.id','=','payments.id_cust')->select('payments.*','customers.nomor_kamar')->where('payments.status','Belum Bayar')->get();
        $request->session()->put('name',Users::where('email',$request->session()->get('email'))->first()->name);

        // dd($data);
        return view('admin/home',['data'=>$data]);
    }

    public function showHistory()
    {
        $data = DB::table('customers')->join('payments','customers.id','=','payments.id_cust')->select('payments.*','customers.nomor_kamar','customers.nama')->where('payments.status','Lunas')->get();
        return view('admin/history',['data'=>$data]);
    }

    public function showById(Request $request)
    {
        if (!$request->session()->get('email')) {
            $request->session()->invalidate();
            return redirect('login');
        }
        $data = Users::where('email',$request->session()->get('email'))->first();
        // $data = Payment::where('id_cust',$data->id_cust)->first();
        $data = DB::table('customers')->join('payments','customers.id','=','payments.id_cust')->select('payments.*','customers.nomor_kamar','customers.nama','customers.tipe_kamar')->where('id_cust',$data->id_cust)->orderBy('payments.created_at', 'desc')->get();
        // dd($data);
        return view('home',['data'=>$data]);
    }

    public function storeImage(Request $request)
    {
        $data = Payment::find($request->id);
        $data->image = $request->file('formPembayaran')->store('bukti-pembayaran');
        $data->save();
        return redirect('/');
    }

    public function updateStatus(Request $request)
    {
        $payment = Payment::find($request->id);
        $payment->status = 'Lunas';
        $payment->save();
        return redirect('admin');
    }

    public function sendPayment(Request $request)
    {
        $data = [
            'jatuh_tempo' => date("Y/m/d"),
            'tagihan' => $request->tagihan,
            'status' => 'Belum Bayar',
            'id_cust' => $request->id,
        ];
        Payment::create($data);
        return redirect('admin');
    }

    // Delete
    public function deleteHistory(Request $request)
    {
        Payment::destroy($request->id);
        return redirect('admin/history');
    }
}
