<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transactions;
use App\Models\Wallet;

use Web3\Web3;
use Web3\ValueObjects\{Transaction, Wei};

use GuzzleHttp\Client;

class Sendwallet extends Component
{
    public $to, $from, $sum, $currenncy, $analytics;

    public function getwallet()
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

        return $contents->wallet_address;
    }


    public function send()
    {
        $web3 = new Web3('http://127.0.0.1:8545');
        $value = Wei::fromEth($this->sum);

        $transaction = Transaction::between($this->from, $this->to)->withValue($value);
        $web3->eth()->sendTransaction($transaction); 
        $web3->eth()->gasPrice()->toEth();
        $account = $web3->eth()->accounts();
        //save transaction
        Transactions::create(['currency' => $this->currenncy, 'sum' => (float)$this->sum, 'type' => 'send','wallet_id' => $account[0]]);
        // $account = $web3->eth()->accounts();
        // Wallet::create(['wallet_id' => $account[0],'sent' => 0,'recived' => 0,'user' => "admin"]);


        //update wallet
        Wallet::where('address', $this->from)->update(array('sum_crypto' => $web3->eth()->getBalance($this->from)->toEth()));

        //live updating component
        $this->emit(event: 'refreshTransactioins');
        $this->emit(event: 'refreshList');
        $this->emit(event: 'refreshAnalitic');
        // $this->emit(event: 'refreshWallet');
       

        
        
        //reset fields
        $this->reset();
        
    }

    public function render()
    {
        // $this->analytics = Wallet::all();
        return view('livewire.sendwallet');
    }
}
