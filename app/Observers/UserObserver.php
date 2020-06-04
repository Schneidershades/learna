<?php


namespace App\Observers;

// use App\Events\User\RegistrationEvent;
use App\Models\User;
use App\Models\Instructor;
use App\Models\Participant;

class UserObserver
{
    public function creating(User $user)
    {
        $user->password = bcrypt($user->password);
        $user->remember_token = dechex(time()).bin2hex(random_bytes(10));
    }

    public function created(User $user)
    {
        // event(new RegistrationEvent($user));
        if($user->type == 'participant'){
        	$participant = new Participant;
        	$participant->user_id =  $user->id;
        	$participant->save();
        }

        if($user->type == 'instructor'){
        	$instructor = new Instructor;
        	$instructor->user_id =  $user->id;
        	$instructor->save();
        }
    }
}
