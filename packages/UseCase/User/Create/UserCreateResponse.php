<?php

namespace packages\UseCase\User\Create;

use packages\UseCase\User\Common\UserModel;

class UserCreateResponse
{
    /**
     * @var UserModel[]
     */
    public $users;

    /**
     * UserCreateResponse constructor.
     *
     * @param UserModel[] $users
     */
    public function __construct(array $users)
    {
        $this->users = $users;
    }
}
