<?php

namespace App\Http\Livewire;
use App\Models\Transactions;

use GuzzleHttp\Client;
use Livewire\Component;

class Transhistory extends Component
{
    public $transactions;
    public $listeners = ['refreshTransactioins' => '$refresh'];

    public function mytransactions(){
       
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://127.0.0.1:8000/api/get-wallet-status',
            'timeout'  => 2.0,
        ]);
        $response = $client->request('GET', '?email=tester1@mail.com');
    
        // Provide the body as a string.

        $contents = json_decode($response->getBody()->getContents());

        $this->transactions = Transactions::all()->where('wallet_id', $contents->wallet_address)->reverse()->values()->take(10);
    }

    public function render()
    {
        $this->mytransactions();
        return view('livewire.transhistory');
    }
}
