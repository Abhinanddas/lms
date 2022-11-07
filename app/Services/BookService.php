<?php


namespace App\Services;

use App\Repositories\BookRepository;

class BookService
{
    private $bookRepo;

    public function __construct(BookRepository $bookRepo)
    {
        $this->bookRepo = $bookRepo;
    }

    public function fetchBooks($request)
    {
        $skip = $request->skip;
        $limit = $request->limit;
        $searchParam = $request->searchParam;
        $searchBy = $request->searchBy;
    }

    public function fetchLanguages($request)
    {

        $skip = $request->skip;
        $limit = $request->limit;

        return $this->bookRepo->getLanguages($skip, $limit);
    }
}
