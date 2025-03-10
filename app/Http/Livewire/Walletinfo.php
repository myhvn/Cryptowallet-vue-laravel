<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Wallet;
use Web3\Web3;

use GuzzleHttp\Client;

class Walletinfo extends Component
{
    //here i`m taking currencys from wallet
    public $analytics_sum,$analytics_tiker;
    public $listeners = ['refreshWallet' => '$refresh'];

    public function ethprice($val){
        $url = 'https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=ethereum';
        $data = file_get_contents($url);
        $priceInfo = json_decode($data);
        return($val * $priceInfo[0]->current_price);
    }


    public function mycurrencys(){
       
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://127.0.0.1:8000/api/get-wallet-status',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        $response = $client->request('GET', '?email=tester1@mail.com');
    
        // Provide the body as a string.

        $contents = json_decode($response->getBody()->getContents());

        $web3 = new Web3('127.0.0.1:8545');
        $account = $web3->eth()->accounts();
        $ballance = $web3->eth()->getBalance($account[0])->toEth();

        $wallet_id = Wallet::where('address', $contents->wallet_address)->firstOrFail();

        $this->analytics_sum[] = $ballance;
        $this->analytics_tiker[] = $wallet_id->tiker;
        // dd($wallet_id->sum_crypto);
    }

    public function render()
    {
        $this->mycurrencys();
        return view('livewire.walletinfo');
    }
}
