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
          ->insert([
              'name'     => $user->getName(),
              'email'    => $user->getEmail(),
              'password' => $user->getHashPass(),
          ]);
    }

    /**
     * @param UserId $id
     * @return User
     */
    public function find(UserId $id)
    {
        $user = DB::table('users')
                  ->where('id', $id->getValue())
                  ->first();

        return new User($id, $user->name);
    }

    /**
     * @param int|null $limit
     * @return User[]
     */
    public function getOrderById(?int $limit = null): array
    {
        $query = DB::table('users')
                   ->orderBy('id');

        if (!is_null($limit)) {
            $query->limit($limit);
        }

        $result = $query->get();

        $users = [];
        foreach ($result as $r) {
            $user = new User($r->name, $r->email, $r->password);
            $user->setId($r->id);
            $users[] = $user;
        }

        return $users;
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
