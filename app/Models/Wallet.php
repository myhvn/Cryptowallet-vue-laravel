<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Wallet extends Model
{
    use HasFactory;
    protected $fillable = ['name','tiker','sum_real','sum_crypto','decimals','price','type','img', 'address'];
}

?>