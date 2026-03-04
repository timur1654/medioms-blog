<?php

namespace App\Repositories\Intarfaces;


use App\Models\User;

interface UserRepositoryInterface
{
    public function create(array $data):User;

    public function findByEmail(string $email): ?User;
}
