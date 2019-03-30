<?php

namespace packages\Domain\Domain\User;

interface UserRepositoryInterface
{
    /**
     * @param User $user
     */
    public function save(User $user);

    /**
     * @param UserId $id
     */
    public function find(UserId $id);

    /**
     * @param int $page
     * @param int $size
     */
    public function findByPage($page, $size);
}
