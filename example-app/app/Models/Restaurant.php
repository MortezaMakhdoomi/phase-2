<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\product as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Restaurant extends Model
{
    
    use HasApiTokens, HasFactory, Notifiable, HasRoles;


    protected $fillable = [
        'title',
        'type',
        'address',
        'is_open',
        
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
