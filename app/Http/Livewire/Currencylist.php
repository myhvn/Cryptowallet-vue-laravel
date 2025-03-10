<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transactions;
use App\Models\Wallet;

use App\Http\Livewire\Field;
use Illuminate\Http\Request;

use Web3\Web3;
use Web3\ValueObjects\{Transaction, Wei};

use GuzzleHttp\Client;


class Currencylist extends Component
{
    public $cryptolist,$name,$tiker,$sum_real,$sum_crypto,$decimals,$price,$type,$img,$contract;
    public $listeners = ['refreshList' => '$refresh'];

    public function ethprice($val){
        $url = 'https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=ethereum';
        $data = file_get_contents($url);
        $priceInfo = json_decode($data);
        return($val * $priceInfo[0]->current_price);
    }
    

    public function remove(){
        Wallet::query()->delete();
        Transactions::query()->delete();

        //live updating component
        $this->emit(event: 'refreshTransactioins');
        $this->emit(event: 'refreshList');
    }

    public function deposit(){
        $web3 = new Web3('http://127.0.0.1:8545');
        $value = Wei::fromEth('1');

        $accounts = $web3->eth()->accounts();

        $transaction = Transaction::between('0xc6ea9012587418ee2fdf59a21606a3d2350ac7c8', '0x8ccb4952331abf48afe6db7d026015700b490628')->withValue($value);
        $web3->eth()->sendTransaction($transaction); 
        Transactions::create(['currency' => 'ETH', 'sum' => 1, 'type' => 'deposit']);

        //live updating component
        $this->emit(event: 'refreshList');
    }


    public function update()
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://127.0.0.1:8000/api/get-wallet-status',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        $response = $client->request('GET', '?email=tester1@mail.com');
    
        // Provide the body as a string.

        $contents = json_decode($response->getBody()->getContents());

        $wallet_id = Wallet::where('address', $contents->wallet_address)->firstOrFail();

        $web3 = new Web3('127.0.0.1:8545');
        $account = $web3->eth()->accounts();
        
        //to do: create if user exists statement
        $ballance = $web3->eth()->getBalance($account[0])->toEth();
        foreach ($contents->wallet_lists as &$value) {
            if ($value->tiker == 'ETH'){
            Wallet::where('tiker', $value->tiker)->update(array('sum_crypto' => $ballance));
            }
            else{
            Wallet::where('tiker', $value->tiker)->update(array('sum_crypto' => $wallet_id->sum_crypto)); 
            }
        
        }
        //live updating component
       
    }

    public function save()
    {
        if (Wallet::where('tiker', $this->tiker)->exists()) {
        return 'you already have this currency';
        }
        else{
            Wallet::create(['name' => $this->name, 'tiker' => $this->tiker,'sum_real' => 0,'sum_crypto' => 0,'img' => 'https://cdn-icons-png.flaticon.com/512/8035/8035454.png', 'decimals' => $this->decimals, 'address' => $this-> contract]);
        }
    }

    

    public function render()
    {
        $this->update();
        $this->cryptolist = Wallet::all()->take(5);
        return view('livewire.currencylist');
    }

}