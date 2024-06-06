<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['procedure_id', 'title', 'content'];

    public function procedure()
    {
        return $this->belongsTo(Procedure::class);
    }
}
