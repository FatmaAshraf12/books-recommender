<?php

namespace App\Repositories\UserBook;
use App\Models\UserBook;

class UserBookRepository implements UserBookRepositoryInterface
{
    protected $userBook;
    public function __construct(UserBook $userBook)
    {
        $this->userBook = $userBook;
    }

    public function create($request)
    {
        return $this->userBook->create($request);
    }
 

}