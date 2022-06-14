<?php

namespace App\Models;

use App\Models\Flight;
use Laravel\Cashier\Billable;
use Illuminate\Support\Carbon;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'birthDate',
        'adress',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function books($incoming = true){
        $fk = 'id_booker';
        $qb = $this->hasMany(Book::class, $fk);

        if($incoming){
            $qb->whereRelation('flight','startDateTime', '>', Carbon::now());
        } else {
            $qb->whereRelation('flight','endDateTime', '<', Carbon::now());
        }

        return $qb->orderBy('date');

    }

    public function isAdmin() {
        return $this->role === 'admin';
    }

    public function flights($incoming = true){
        $fk = 'id_pilot';
        $qb = $this->hasMany(Flight::class, $fk);

        if($incoming){
            $qb->where('startDateTime', '>', Carbon::now());
        } else {
            $qb->where('endDateTime', '<', Carbon::now());
        }

        return $qb->orderBy('startDateTime');
    }
}
