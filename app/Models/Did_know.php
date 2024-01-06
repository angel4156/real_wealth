<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Did_know extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'did_knows';

    protected $guarded = ['id'];
}
