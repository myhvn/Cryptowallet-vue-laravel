<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transactions;
use Carbon\Carbon;

use GuzzleHttp\Client;

class Walletanalytic extends Component
{
    public $sum,$day;
    public $sumarr = array();
    public $dayarr = array();
    public $listeners = ['refreshAnalitic' => '$refresh'];
 

   public function getanalytics()
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

        $transarr = Transactions::all()->where('wallet_id', $contents->wallet_address)->reverse()->values()->take(10);
 
        $sumarr = array();
        $dayarr = array();


        $final_array = array();
        foreach ($transarr as $array) {
        $type= false;
        foreach ($final_array as $pos => $temp_array) {
            if(substr(Carbon::parse($temp_array['created_at'])->format('l'),0,3) == substr(Carbon::parse($array['created_at'])->format('l'),0,3)){
                $final_array[$pos]['sum'] += $array['sum'];
                $sumarr[$pos] += $array['sum'];
                $type= true;
            }
        }
        
        if(!$type) {
            $final_array[] = array(
                'created_at' => substr(Carbon::parse($array['created_at'])->format('l'),0,3), 
                'sum' => $array['sum'],);
                
                $sumarr[] = $array['sum'];
                $dayarr[] = substr(Carbon::parse($array['created_at'])->format('l'),0,3);
            
            }
            
        }
        
        $this->sumarr = array_reverse($sumarr);
        $this->dayarr = array_reverse($dayarr);
        

        
    }


    public function render()
    {
        $this->getanalytics();
        return view('livewire.walletanalytic');
    }
}
