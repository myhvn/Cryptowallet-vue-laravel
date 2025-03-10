<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Models\Wallet;

use Web3\Web3;

class AuthController extends Controller
{


    public function register(Request $request)
    {

        
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $web3 = new Web3('127.0.0.1:8545');
        $account = $web3->eth()->accounts();
        $ballance = $web3->eth()->getBalance($account[0])->toEth();
        Wallet::create(['name' => 'Etherium','tiker' => 'ETH','sum_real' => 0.0,'sum_crypto' => $ballance,'decimals' => 0,'price' => 0,'type' => 'ERC20','img' => 'https://cdn-icons-png.flaticon.com/512/8035/8035454.png', 'address' => $account[0]]);
        
        $user = User::create([
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'wallet_id' => Wallet::latest()->first()->id,
        ]);
        

        $token = $user->createToken('auth_token')->plainTextToken;

        //to do: create if user exists statement

        

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'account' => $account[0],
        ]);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }

        $token = $request->session()->token();

        $user = User::where('email', $request['email'])->firstOrFail();
        $wallet_id = User::whereEmail($request['email'])->first()->wallet_id;
        $wallet_id = Wallet::where('id', $wallet_id)->firstOrFail();
        

        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'wallet_id' => $wallet_id->address,
        ]);
        
    }

}