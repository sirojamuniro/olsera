<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pajak extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pajaks';

    protected $fillable = ['nama','rate'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $appends = [
        'rate'
    ];
    
    public function item()
    {
        return $this->belongsTo(item::class, 'id', 'id');
    }

    public function getRateAttribute()
    {

        $result = $this->attributes['rate'];
        $percent = $result * 1 . '%';
        return $percent;

    }

}
