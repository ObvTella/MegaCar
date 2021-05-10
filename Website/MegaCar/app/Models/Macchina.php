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
 'targa',
 'marca',
 'modello',
 'tipo',
 'anno',
 'prezzo',
 'descrizione_macchina',
 'porte',
 'posti',
 'usato',
 ];
}
?> 