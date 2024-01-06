<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About_data extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'about_datas';

    protected $guarded = ['id'];
}
