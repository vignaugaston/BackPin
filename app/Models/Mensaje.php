<?php
namespace APP\Models;

use Iluminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
 
  protected $fillable = ['name','email','phone','message'];
  
}