<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Holiday extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at']; // 必須加這行才有軟刪除

}
