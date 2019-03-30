<?php

namespace packages\InMemoryInfrastructure\User;

use packages\Domain\Domain\User\User;
use packages\Domain\Domain\User\UserId;
use packages\Domain\Domain\User\UserRepositoryInterface;

class InMemoryUserRepository implements UserRepositoryInterface
{
    private $db = [];

    /**
     * @param User $user
     */
    public function save(User $user)
    {
        $this->db[$user->getId()
                       ->getValue()] = $user;
        var_dump($this->db);
    }

    /**
     * @param UserId $id
     * @return User
     */
    public function find(UserId $id)
    {
        $found = $this->db[$id->getValue()];

        return $this->clone($found);
    }

    /**
     * @param int|null $limit
     * @return User[]
     */
    public function getOrderById(?int $limit = null): array
    {
        $result = [];
        foreach ($this->db as $id => $val) {
            $result[] = $this->clone($val);

            if (!is_null($limit) && count($result) >= $limit) {
                break;
            }
        }

        return $result;
    }

    /**
     * @param User $user
     * @return User
     */
    private function clone(User $user)
    {
        $cloned = new User($user->getId(), $user->getName());

        return $cloned;
    }

    /**
     * @param int $page
     * @param int $size
     * @return User[]
     */
    public function findByPage($page, $size)
    {
        $start = ($page - 1) * $size;

        return array_slice($this->db, $start, $size);
    }
}
