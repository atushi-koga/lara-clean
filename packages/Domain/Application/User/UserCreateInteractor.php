<?php

namespace packages\Domain\Application\User;

use packages\Domain\Domain\User\User;
use packages\Domain\Domain\User\UserId;
use packages\Domain\Domain\User\UserRepositoryInterface;
use packages\UseCase\User\Common\UserModel;
use packages\UseCase\User\Create\UserCreateUseCaseInterface;
use packages\UseCase\User\Create\UserCreateRequest;
use packages\UseCase\User\Create\UserCreateResponse;

class UserCreateInteractor implements UserCreateUseCaseInterface
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * UserCreateInteractor constructor.
     *
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(UserCreateRequest $request)
    {
        // 登録すべきUserインスタンスを作成する
        $createdUser = new User($request->getName(), $request->getEmail(), $request->getPassword());

        // DBにユーザを登録する
        $this->userRepository->save($createdUser);

        // 登録されたユーザの一覧情報を返す
        $registeredUsers = $this->userRepository->getOrderById();
        $userModels      = array_map(function ($user) {
            return new UserModel($user->getId(), $user->getName());
        }, $registeredUsers);

        return new UserCreateResponse($userModels);

    }
}
