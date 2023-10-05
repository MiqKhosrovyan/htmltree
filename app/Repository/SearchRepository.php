<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class SearchRepository
{
    public function search(array $data)
    {
        $output = preg_replace('!\s+!', ' ', $data['search']);
        $word = explode(" ", $output);


        return DB::select(
            "select find_word.id, find_word.title, find_word.body FROM
           ( SELECT `id`,`title`,`body` FROM articles
             WHERE MATCH (title,body) AGAINST ('>$word[0] word[1]' IN BOOLEAN MODE))
             AS find_word
             WHERE
             LENGTH(SUBSTRING_INDEX(SUBSTRING_INDEX(find_word.body, ?,-1),?, 1)) - LENGTH(REPLACE(SUBSTRING_INDEX(SUBSTRING_INDEX(find_word.body, ?,-1),?, 1), ' ', '')) - 1 = ?",

            [$word[0], $word[1], $word[0], $word[1], 5]
        );
    }
}
