<?php

namespace App\Traits;

use App\Models\Languages;

trait BookTrait
{

    public function getLanguages($skip = 0, $limit = 100)
    {
        return Languages::where('is_deleted', false)
            ->take($limit)
            ->get()
            ->skip($skip);
    }
}
