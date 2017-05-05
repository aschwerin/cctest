<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class UserStatusChangeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var User
     */
    protected $user;

    /**
     * Create a new message instance.
     *
     * @param User $user
     *
     * @return UserStatusChangeMail
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
//        return $this->view('email.user_status');
        return $this->view('email.user_status')
            ->with([
                'roles' => $this->user->roles,
                'name' => $this->user->name,
                'email' => $this->user->email,
                'active' => $this->user->active,
            ]);
    }
}
