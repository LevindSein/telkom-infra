<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $keyType    = 'string';
    protected $guarded    = [];
    public $timestamps    = false;
    public $incrementing  = false;
}
