<?php 

namespace App\Repositories;

interface GuardianAPIRepostoryInterface {
    public function fetchArticles(): array;
}