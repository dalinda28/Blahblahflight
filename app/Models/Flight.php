<?php

namespace App\Models;

use App\Models\Airport;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Flight extends Model
{


    public $timestamps = false;

    protected $guarded = [];

    use HasFactory;

    public const DEFAULT_DATE_FORMAT = 'm/d/Y \a\t h:i a';

    public function pilot(){
        return $this->belongsTo(User::class, 'id_pilot');
    }

    public function books(){
        return $this->hasMany(Book::class, 'id_flight');
    }

    public function booked(){
        $qty = 0;
        foreach($this->books as $book){
            $qty += $book->passengers;
        }
        return $qty;
    }

    public function capacityLeft($stringMode = false){
        $capacity = $this->capacity;
        if($stringMode){
            $capacity .= ' sit' . ($capacity > 1 ? 's' : '') . ' left';
        }
        return $capacity;
    }

    public function airport_inbound(){
        return $this->belongsTo(Airport::class, 'inbound');
    }

    public function airport_outbound(){
        return $this->belongsTo(Airport::class, 'outbound');
    }

    public function formatStartDate($format = null){
        if(!$format){
            $format = self::DEFAULT_DATE_FORMAT;
        }
        return date_create($this->startDateTime)->format($format);
    }

    public function formatEndDate($format = null){
        if(!$format){
            $format = self::DEFAULT_DATE_FORMAT;
        }
        return date_create($this->endDateTime)->format($format);
    }
}
