<?php

namespace App\Listeners;

use Throwable;
use App\libs\Purple;
use App\Events\Auth\Register;
use Illuminate\Events\Dispatcher;
use App\Notifications\VerifyNewUser;
use App\Events\Account\UpadtePassword;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\welcomeNewCustomer;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\UpdateAccountPassword;

class UserEventSubscriber  implements ShouldQueue
{
    use InteractsWithQueue;


    /**
     * Handle the event.
     */
    public function handleUserRegister(Register $event): void
    {
        $user = $event->user;
        
        $user->notify(new welcomeNewCustomer($user));
        #$user->notify((new KycNeeded($user))->delay(now()->addHours(2)));
        $user->notify(new VerifyNewUser($user, Purple::LINK_CUSTOMER));
    }

    public function handleUpdateAccountPassword(UpadtePassword $event): void
    {
        $user = $event->user;
        $user->notify(new UpdateAccountPassword($user));
    }

    
    /**
     * Handle a job failure.
     */

    public function failedUserRegister(Register $event, Throwable $exception): void
    {
        // ...
        
    }

    public function failedUpdateAccountPassword(UpadtePassword $event, Throwable $exception): void
    {
        // ...
    }

    /**
     * Register the listeners for the subscriber.
     */

    public function subscribe(Dispatcher $events): void
    {
        $events->listen(
            Register::class,
            [UserEventSubscriber::class, 'handleUserRegister']
        );

        $events->listen(
            UpadtePassword::class,
            [UserEventSubscriber::class, 'handleUpdateAccountPassword']
        );
 
    }
}
