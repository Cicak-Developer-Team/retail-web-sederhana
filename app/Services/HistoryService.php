<?php 
namespace App\Services;

use App\Models\History;
use Exception;

class HistoryService{
    static function add($text) {
        try {
            History::create([
                "text" => $text
            ]);
        }catch(Exception $e) {
            dump($e->getMessage());
        }
    }
}