<?php

namespace packages\Domain\Application\User;

use packages\Domain\Domain\User\UserRepositoryInterface;
use packages\UseCase\User\Common\UserModel;
use packages\UseCase\User\GetList\UserGetListRequest;
use packages\UseCase\User\GetList\UserGetListResponse;
use packages\UseCase\User\GetList\UserGetListUseCaseInterface;

class UserGetListInteractor implements UserGetListUseCaseInterface
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * UserGetListInteractor constructor.
     *
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param UserGetListRequest $request
     * @return UserGetListResponse
     */
    public function handle(UserGetListRequest $request)
    {
        $users = $this->userRepository->getOrderById($request->getSize());

        $userModels = array_map(function ($user) {
            return new UserModel($user->getId(), $user->getName());
        }, $users);

        return new UserGetListResponse($userModels);
    }
}
