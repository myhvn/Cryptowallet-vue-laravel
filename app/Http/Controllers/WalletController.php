<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Transactions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Web3\Web3;
use Web3\ValueObjects\{Transaction, Wei};

class WalletController extends Controller
{


    public function status(Request $request){
        // if (!Auth::attempt($request->only('email'))) {
        //     return response()->json([
        //         'message' => 'Invalid details'
        //     ], 401);
        // }

        $email = $request->query('email');
                
        $wallet_id = User::whereEmail($request->query('email'))->first()->wallet_id;
        $wallet_id = Wallet::where('id', $wallet_id)->firstOrFail();
        $user_list = Wallet::select('tiker')->where('address', $wallet_id->address)->get();

        // $tikers = [];
        // foreach ($user_list as $list) {
        //     $tikers[] = $list->tiker;
        // }
        
        return response()->json([
            'email' => $email,
            'wallet_address' => $wallet_id->address,
            'wallet_lists'=> $user_list,
        ]);
    }



    public function deduct(Request $request){
        
        $email = $request->get('email');
        $amount = $request->get('amount');
        
        $wallet_id = User::whereEmail($request->get('email'))->first()->wallet_id;
        $wallet_id = Wallet::where('id', $wallet_id)->firstOrFail();

        Transactions::create(['currency' => $wallet_id->name, 'sum' => (float)$amount, 'type' => 'deduct']);
        // $wallet = DB::table('wallets')->select('wallet_id')->get();
        return response()->json([
            'email' => $email,
            'cryptocurrency'=> $wallet_id->tiker,
            'amount' => $amount
        ]);
    }

    public function cashout(Request $request){

        $email = $request->get('email');
        $amount = $request->get('amount');
        $recipent = $request->get('recipent');

        $wallet_id = User::whereEmail($request->get('email'))->first()->wallet_id;
        $wallet_id = Wallet::where('id', $wallet_id)->firstOrFail();

        $web3 = new Web3('http://127.0.0.1:8545');
        $value = Wei::fromEth((float)$amount);

        $transaction = Transaction::between($wallet_id->address, $recipent)->withValue($value);
        $web3->eth()->sendTransaction($transaction);
        $gas = $web3->eth()->gasPrice()->toEth();
        //save transaction
        Transactions::create(['currency' => $wallet_id->name, 'sum' => (float)$amount, 'type' => 'send']);
        // $account = $web3->eth()->accounts();
        // Wallet::create(['wallet_id' => $account[0],'sent' => 0,'recived' => 0,'user' => "admin"]);


        //update wallet
        Wallet::where('address', $wallet_id->address)->update(array('sum_crypto' => $web3->eth()->getBalance((float)$amount))->toEth());


        return response()->json([
            'email' => $email,
            'cryptocurrency'=> $wallet_id->tiker,
            'amount' => $amount,
            'gas' => $gas,
        ]);
    }

}