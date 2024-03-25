<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\submitIntervalRequest;
use App\Services\BookService;

class BookController extends Controller
{ 
    protected $bookService;
    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }
    
    /**
     * @OA\Post(
     *     path="/api/submit-reading-interval",
     *     summary="Submit reading interval",
     *     tags={"Books"},
     * @OA\RequestBody(
     *         required=true,
     *         description="User object that needs to be added to the system",
     *         @OA\JsonContent(
     *             required={"user_id", "book_id" , "start_page" , "end_page"},
     *             @OA\Property(property="user_id", type="string", example="1", description="User Id"),
     *             @OA\Property(property="book_id", type="string", example="1", description="Book Id"),
     *             @OA\Property(property="start_page", type="integer", example=2, description="Start Page"),
     *             @OA\Property(property="end_page", type="integer", example=12, description="End Page"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="interval submitted successfully",
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="wrong data",
     *     ),
     * )
     */
    public function saveReadingInterval(submitIntervalRequest $request)
    {
        return $this->bookService->saveReadingInterval($request);

    }

   /**
     * @OA\Get(
     *     path="/api/get-recommended-books",
     *     summary="Get a list of recommended books",
     *     tags={"Books"},
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=400, description="Invalid request")
     * )
     */
    public function getRecommendedBooks()
    {
       return $this->bookService->getRecommendedBooks();
    }
}
