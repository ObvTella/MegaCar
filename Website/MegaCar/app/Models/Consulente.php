<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Macchina extends Model 
{
 /**
 * The attributes that are mass assignable
 *
 * @var array
 */
 public $timestamps = false; //Non si vedono nella tabella
 protected $fillable = [
 'id',
 'nome_consulente',
 'cognome_consulente',
 'email_consulente',
 ];
}
?> 