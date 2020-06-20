<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\User\UserCollection;
use App\Models\Instructor;
use App\Models\Courses;
use App\Models\Wallet;
use App\Models\Payment;
use App\Models\Participant;
use App\Models\ParticipantCourse;
use App\Models\ParticipantModule;
use App\Models\ParticipantTopic;
use App\Models\ParticipantProject;
use App\Models\ParticipantQuestion;
use App\Models\ParticipantQuiz;


class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    public $oneItem = UserResource::class;
    public $allItems = UserCollection::class;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function instructor()
    {
        return $this->hasOne(Instructor::class);
    }

    public function instructorCourses()
    {
        return $this->hasMany(Courses::class);
    }

    public function instructorWallets()
    {
        return $this->hasMany(Wallet::class);
    }

    public function instructorPayments()
    {
        return $this->hasMany(Payment::class, 'instructor_id');
    }

    public function participant()
    {
        return $this->hasOne(Participant::class);
    }

    public function participantCourses()
    {
        return $this->hasMany(ParticipantCourse::class);
    }

    public function participantModules()
    {
        return $this->hasMany(ParticipantModule::class);
    }

    public function participantTopics()
    {
        return $this->hasMany(ParticipantTopic::class);
    }

    public function participantProjects()
    {
        return $this->hasMany(ParticipantProject::class);
    }

    public function participantQuestions()
    {
        return $this->hasMany(ParticipantQuestion::class);
    }

    public function participantQuizzes()
    {
        return $this->hasMany(ParticipantQuiz::class);
    }

    public function participantPayments()
    {
        return $this->hasMany(Payment::class, 'participant_id');
    }
}
