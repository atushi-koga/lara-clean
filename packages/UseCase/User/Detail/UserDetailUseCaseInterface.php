<?php

namespace packages\UseCase\User\Create;

interface UserDetailUseCaseInterface
{
    /**
     * @param UserDetailRequest $request
     * @return UserDetailResponse
     */
    public function handle(UserDetailRequest $request);
}
