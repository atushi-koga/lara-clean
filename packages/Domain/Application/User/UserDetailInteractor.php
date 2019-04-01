<?php

namespace packages\Domain\Application\User;

use packages\Domain\Domain\User\User;
use packages\Domain\Domain\User\UserRepositoryInterface;
use packages\UseCase\User\Common\UserModel;
use packages\UseCase\User\Create\UserDetailRequest;
use packages\UseCase\User\Create\UserDetailResponse;
use packages\UseCase\User\Create\UserDetailUseCaseInterface;

class UserDetailInteractor implements UserDetailUseCaseInterface
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * UserDetailInteractor constructor.
     *
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param UserDetailRequest $request
     * @return UserDetailResponse
     */
    public function handle(UserDetailRequest $request)
    {
        $registeredUser = $this->userRepository->find($request->getId());

        $userModel = new UserModel($registeredUser->getId(), $registeredUser->getName());

        return new UserDetailResponse($userModel);
    }
}
