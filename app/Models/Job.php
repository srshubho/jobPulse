<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Job extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'status',
        'approved_at',
    ];

    public function deadline()
    {
        return Carbon::parse($this->deadline)->format('Y-m-d');
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function jobCategory()
    {
        return $this->belongsTo(JobCategory::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
