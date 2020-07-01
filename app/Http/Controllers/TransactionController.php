<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;

define("MESSAGE", "message");

class TransactionController extends Controller
{
    
    public function create(Request $request)
    {
        $this->validate($request, [
            "id" => 'required|integer',
            "totalPrice" => 'required|integer',
            "paymentCode" => 'required',
            "paymentId" => 'required|integer',
        ]);
        
        $data = $request->all();
        $transaction = Transaction::create($data);

        return response()->json($transaction);
    }
    
    public function get($id) {
        $transaction = Transaction::find($id);
        return response()->json($transaction);
    }
}
