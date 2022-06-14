<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $timestamps = false;
    
    protected $guarded = [];

    use HasFactory;

    public function flight(){
        $fk = 'id_flight';
        $qb = $this->belongsTo(Flight::class, $fk);
        return $qb;
    }
}
