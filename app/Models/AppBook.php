<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AppBook extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';

    protected $primaryKey = 'uuid';
    public $incrementing = false;

    protected $table = 'app_books';
    protected $fillable = [
        'uuid',
        'title',
        'publisher',
        'author',
        'genre',
        'amount',
        'price',
        'publication',
    ];
}
