<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Pajak;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'items';

    protected $fillable = ['nama'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $appends = [
        'pajak'
    ];


    public function getPajakAttribute()
    {
        $total = Pajak::count();

        return $total >= 2 ? Pajak::get(): null;

    }
}
