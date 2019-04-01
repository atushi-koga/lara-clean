<?php

namespace packages\Domain\Domain\User;

interface UserRepositoryInterface
{
    /**
     * @param User $user
     */
    public function save(User $user);

    /**
     * @param int $id
     * @return User
     */
    public function find(int $id);

    /**
     * @param null|int $limit
     * @return User[]
     */
    public function getOrderById(?int $limit = null);

    /**
     * @param int $page
     * @param int $size
     */
    public function findByPage($page, $size);
}
