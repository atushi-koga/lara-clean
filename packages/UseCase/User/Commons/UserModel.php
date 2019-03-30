<?php

namespace packages\UseCase\User\Common;

class UserModel
{
    public $id;
    public $name;

    public function __construct(string $id, string $name)
    {
        $this->id   = $id;
        $this->name = $name;
    }
}
