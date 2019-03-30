<?php

namespace packages\Domain\Domain\User;

class User
{
    /**
     * @var UserId
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    public function __construct(UserId $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return UserId
     */
    public function getId(): UserId
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}


