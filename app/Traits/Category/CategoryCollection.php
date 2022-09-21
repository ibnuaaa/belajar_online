<?php

namespace App\Traits\Category;

/* Models */
use App\Models\Category;

use DB;

trait CategoryCollection
{
    public function __construct()
    {
        $this->CategoryModel = Category::class;
        $this->CategoryTable = getTable($this->CategoryModel);
    }

    public function GetCategoryDetails($Categorys)
    {
        $CategoryID = $Categorys->pluck('id');

        $Categorys->map(function($Category) {
            return $Category;
        });
        return $Categorys;
    }

}
