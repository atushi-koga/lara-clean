<?php

namespace packages\UseCase\User\Create;

use Illuminate\Support\Facades\Hash;

class UserDetailRequest
{
    /**
     * @var int
     */
    private $id;

    /**
     * UserCreateRequest constructor.
     *
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
