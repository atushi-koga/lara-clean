<?php

namespace packages\UseCase\User\Create;

use packages\UseCase\User\Common\UserModel;

class UserDetailResponse
{
    /**
     * @var UserModel
     */
    public $user;

    /**
     * UserDetailResponse constructor.
     *
     * @param UserModel $user
     */
    public function __construct(UserModel $user)
    {
        $this->user = $user;
    }
}
