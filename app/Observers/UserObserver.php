<?php


namespace App\Observers;

use App\Events\User\RegistrationEvent;
use App\Models\User;

class UserObserver
{
    public function creating(User $user)
    {
        $user->password = bcrypt($user->password);
        $user->remember_token = dechex(time()).bin2hex(random_bytes(10));
    }

    public function created(User $user)
    {
        event(new RegistrationEvent($user));
    }
}
