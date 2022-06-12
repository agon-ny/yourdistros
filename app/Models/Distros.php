<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distros extends Model
{
    use HasFactory;

    protected $fillable = ['name','company','short_description','website','description','image','user_id'];

    // Filtering
    public function scopeFilter($query, $filters) {
        if($filters != null){
            $query->where('name', 'like', '%' .$filters. '%');
        }
    }

    public function User() {
        return $this->belongsTo(User::class);
    }
}
