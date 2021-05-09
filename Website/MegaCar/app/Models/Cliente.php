<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Cliente extends Model 
{
 /**
 * The attributes that are mass assignable
 *
 * @var array
 */
 public $timestamps = false; //Non si vedono nella tabella
 protected $fillable = [
 'username',
 'password',
 'nome_cliente',
 'cognome_cliente',
 'email_cliente',
 'indirizzo',
 ];
}
?> 