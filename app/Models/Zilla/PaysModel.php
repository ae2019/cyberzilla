<?php

namespace App\Models\Zilla;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaysModel extends Model
{
    use HasFactory;
    protected $table = "users_payments";

    public $timestamps = false;

    protected $fillable = [
        'uid',
        'pay_date',
        'summa'
    ];

}
