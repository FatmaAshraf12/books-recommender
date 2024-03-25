<?php

namespace App\Repositories\Book;

use App\Models\Book;
use App\Traits\sms\sendSMS;

class BookRepository implements BookRepositoryInterface
{    use sendSMS;

    protected $book;
    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function updateReadingCounterBooks($request , $userBook)
    {
        try {
            $book = $this->book->find($request['book_id']);
            $old_interval = json_decode($book->read_intervals, true);
            $old_interval[]=[(int)$request['start_page'], (int)$request['end_page']];

            $all = [];
            foreach($old_interval as $longArr)
                for($i=$longArr[0] ; $i<=$longArr[1] ; $i++)    
                    $all[$i] = 1;
                
            $book->update(['read_intervals' => $old_interval , 'num_of_read_pages'=> array_sum($all)-1 ]);
            
            $this->afterSubmission($userBook->user['phone']);

            return response()->json(['message' => 'Submitted successfully']);

        } catch (\Throwable $th) {
            return response()->json(['message' => 'Failed to submit , Try again please']);
        }
    }


    public function getRecommendedBooks()
    {
        try {
            $books = $this->book->where('num_of_read_pages', '>',0)->orderBy('num_of_read_pages', 'desc')->take(5)->select('id as book_id','name as book_name','num_of_read_pages' )->get();
            return $books;
        } catch (\Throwable $th) {
            return [];
        }
    }
}