<?php

namespace App\Http\Livewire;

use App\Models\Wallet;

use Livewire\Component;
use Web3\Web3;

use GuzzleHttp\Client;

use Illuminate\Support\Facades\Cookie;

class Genwallet extends Component
{
    


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


    public function render()
    {
        return view('livewire.genwallet');
    }
}
