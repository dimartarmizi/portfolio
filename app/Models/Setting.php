<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['key', 'value'];

    public $timestamps = true;

    protected $casts = [
        'value' => 'array',
    ];

    public function getValueAttribute($value)
    {
        if ($this->key === 'social_links') {
            return json_decode($value, true);
        }

        return $value;
    }

    public function setValueAttribute($value)
    {
        if ($this->key === 'social_links' && is_array($value)) {
            $this->attributes['value'] = json_encode($value);
        } else {
            $this->attributes['value'] = $value;
        }
    }
}
