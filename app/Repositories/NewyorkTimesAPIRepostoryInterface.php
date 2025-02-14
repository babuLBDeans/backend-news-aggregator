<?php 

namespace App\Repositories;

interface NewyorkTimesAPIRepostoryInterface {
    public function fetchArticles(): array;
}