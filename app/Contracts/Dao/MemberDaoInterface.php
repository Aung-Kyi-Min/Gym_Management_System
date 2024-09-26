<?php

namespace App\Contracts\Dao;

use SebastianBergmann\Type\VoidType;

/**
 * Interface of Data Access Object for task
 */
interface MemberDaoInterface
{
    public function store(): void;
}
