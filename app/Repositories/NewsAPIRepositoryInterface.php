<?php 

namespace App\Repositories;

interface NewsAPIRepositoryInterface
{

    public function fetchArticles(): array;
}