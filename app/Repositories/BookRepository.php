<?php

namespace App\Repositories;
use App\Traits\BookTrait;


class BookRepository
{
    
    use BookTrait;
    
    public function fetchBooks($skip = 0, $limit = 10, $searchParam = false, $searchBy = false)
    {

        // $query = B
    }


}
