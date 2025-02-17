<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Doctor extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'doctors';
    protected $guarded = [];



    // One To One get section of Doctor
    public function section()
    {
        return $this->belongsTo(Section::class, 'sectionId');
    }

    // Get the Doctor's image.
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    // Many To Many get appointments of Doctor
    public function doctorAppointments()
    {
        return $this->belongsToMany(Appointment::class, AppointmentDoctor::class );
    }






    // The attributes that should be hidden for serialization.
    protected $hidden = [
        'password',
        'remember_token',
    ];


    // The attributes that should be cast.
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
