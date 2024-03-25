<?php


namespace App\Services;

use App\Repositories\Book\BookRepository;
use App\Repositories\UserBook\UserBookRepository;

class BookService
{
    protected $bookRepository , $userBookRepository;

    public function __construct(BookRepository $bookRepository , UserBookRepository $userBookRepository)
    {
        $this->bookRepository = $bookRepository;
        $this->userBookRepository = $userBookRepository;

    }

    public function saveReadingInterval( $request)
    {
        $validatedData = $request->validated();
        $userBook = $this->userBookRepository->create($validatedData);
        return  $this->bookRepository->updateReadingCounterBooks( $validatedData,$userBook);
    }


    public function getRecommendedBooks()
    {
        return $this->bookRepository->getRecommendedBooks();
    }
}
