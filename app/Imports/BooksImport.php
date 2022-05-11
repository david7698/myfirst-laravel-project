<?php

namespace App\Imports;

use App\Models\Books;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithMappedCells;

class BooksImport implements ToModel
{

    
    
    public function model(array $row)
    {
        Log::debug("row",[$row]);

        $categories = Category::all();
        
        $rowCategory = $row[2];

        $rowCategoryId = null;

        foreach($categories as $category){

            if($rowCategory == $category->name){

                $rowCategoryId = $category->id;
                break;

            }

        }
        // capire se $row[2] è incluso nelle categorie

        foreach($row as $col){
            Log::debug("booooooooooo",[$col]);
            if($col != null && $rowCategoryId != null){

                return new Books([   
                    'title'     => $row[0],
                    'description'   => $row[1], 
                    'id_category' =>  $rowCategoryId,
                    'page_number' => $row[3],
        
                    //
                ]);
        }
    }
  }
}
