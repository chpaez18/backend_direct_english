<?php   
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model{
    protected $table = "usuarios";

    protected $fillable = ['nombre', 'telefono', 'username', 'fecha_nacimiento', 'correo', 'password'];

    // public $timestamps = false;
}