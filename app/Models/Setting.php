<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['key', 'value'];
    // Migration defines timestamps for this table, enable them
    public $timestamps = true;
}
