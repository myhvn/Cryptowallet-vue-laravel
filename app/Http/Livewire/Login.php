<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use App\Models\Wallet;

use Livewire\Component;
use Web3\Web3;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

use Illuminate\Support\Facades\Cookie;

class Login extends Component
{

    public $login_email,$login_password,$register_name,$register_email,$register_password;
    public $isLogged = false;


    public function login(){
       

        $http = new Client();

        $response = $http->post('http://127.0.0.1:8000/login', [
            'form_params' => [
                "email" => $this->login_email,
                "password" => $this->login_password,
            ]
        ]);

        $contents = json_decode($response->getBody()->getContents());
        
        return $response->getBody()->getContents();
        // не могу показать эту функцию целиком

    }


    public function register(){
       
        $http = new Client();
        $response = $http->post('http://127.0.0.1:8000/register', [
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
            ],
            'form_params' => [
                "name" => $this->register_name,
                "email" => $this->register_email,
                "password" => $this->register_password,
            ]
        ]);
        $contents = json_decode($response->getBody()->getContents());
        // не могу показать эту функцию целиком

    }

    public function get_list(){
        // Provide the body as a string.
        $client = new Client(['base_uri' => 'http://127.0.0.1:8000']);
        $response = $client->request('GET','/api/get-wallet-status?email='.$this->login_email);

        $contents = $response->getBody()->getContents();
        
    }

    public function render()
    {
       
        
        return view('livewire.login');
    }
}
