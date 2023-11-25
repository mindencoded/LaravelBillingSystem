<?php

namespace App\Presenters;

use App\Models\Message;
use Coderflex\LaravelPresenter\Presenter;

class MessagePresenter extends Presenter
{

    protected Message $message;

    public function __construct(Message $model)
    {
        $this->message = $model;
        parent::__construct($model);
    }
    /**
     * @return string
     */
    public function userName(): string
    {
        if ($this->message->user !== null) {
            return $this->message->user->name;
        } else {
            return $this->message->name;
        }
    }

    /**
     * @return string
     */
    public function userEmail(): string
    {
        if ($this->message->user !== null) {
            return $this->message->user->email;
        } else {
            return $this->message->email;
        }
    }
}
