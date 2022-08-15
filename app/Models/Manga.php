<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'id_manga',
        'user_id',
        'judul',
        'link_gambar',
        'link_manga',
    ];
}
