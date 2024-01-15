<?php

namespace App\Http\Controllers\Seller;

use App\Enums\UserTransactionType;
use App\Http\Controllers\Controller;
use App\Models\UserTransaction;
use Illuminate\Http\Request;

class SellerTransactionController extends Controller
{
    public function sellerTransactions()
    {
        $transactions = UserTransaction::query()->
        where('user_id',auth()->user()->id)->paginate(10);
        $deposit = UserTransaction::query()->
        where('user_id',auth()->user()->id)->
        where('type',UserTransactionType::Deposit->value)->
        sum('amount');
        $withdraw = UserTransaction::query()->
        where('user_id',auth()->user()->id)->
        where('type',UserTransactionType::Withdraw->value)->
        sum('amount');
        $total_amount = $deposit - $withdraw;
        return view('seller.seller_transactions.list',
            compact('transactions','deposit','withdraw','total_amount'));
    }
}
