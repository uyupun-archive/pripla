<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['lower_limit', 'upper_limit'];

    protected $hidden = ['lower_limit', 'upper_limit'];

    protected $appends = ['range'];

    public function getRangeAttribute()
    {
        $lowerLimit = number_format($this->lower_limit);
        if (!is_null($this->upper_limit)) {
            $upperLimit = number_format($this->upper_limit);
            return "{$lowerLimit} - {$upperLimit}円";
        }
        return "{$lowerLimit}円以上";
    }
}
