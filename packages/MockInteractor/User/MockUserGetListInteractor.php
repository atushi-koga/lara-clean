<?php

namespace packages\MockInteractor\User;

use packages\UseCase\User\Common\UserModel;
use packages\UseCase\User\GetList\UserGetListRequest;
use packages\UseCase\User\GetList\UserGetListResponse;
use packages\UseCase\User\GetList\UserGetListUseCaseInterface;

class MockUserGetListInteractor implements UserGetListUseCaseInterface
{
    /**
     * @param UserGetListRequest $request
     * @return UserGetListResponse
     */
    public function handle(UserGetListRequest $request)
    {
        $users = [
            new UserModel('1', 'test-user-1'),
            new UserModel('2', 'test-user-2'),
        ];

        return new UserGetListResponse($users);
    }
}
