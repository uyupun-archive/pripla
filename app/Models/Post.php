<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Prefecture;
use App\Models\Budget;
use App\Models\Target;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'prefecture_id', 'budget_id', 'target_id', 'flow_chart'];

    protected $hidden = ['prefecture_id', 'budget_id', 'target_id', 'created_at', 'updated_at'];

    protected $casts = ['flow_chart' => 'array'];

    public function prefecture()
    {
        return $this->belongsTo(Prefecture::class);
    }

    public function budget()
    {
        return $this->belongsTo(Budget::class);
    }

    public function target()
    {
        return $this->belongsTo(Target::class);
    }
}
