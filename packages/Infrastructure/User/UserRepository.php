<?php

namespace packages\Infrastructure\User;

use packages\Domain\Domain\User\User;
use packages\Domain\Domain\User\UserId;
use packages\Domain\Domain\User\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @param User $user
     */
    public function save(User $user)
    {
        DB::table('users')
          ->updateOrInsert(['id' => $user->getId()], ['name' => $user->getName()]);
    }

    /**
     * @param UserId $id
     * @return User
     */
    public function find(UserId $id)
    {
        $user = DB::table('users')->where('id', $id->getValue())->first();

        return new User($id, $user->name);
    }

    /**
     * @param int $page
     * @param int $size
     */
    public function findByPage($page, $size)
    {
        // TODO: Implement findByPage() method.
    }


}
