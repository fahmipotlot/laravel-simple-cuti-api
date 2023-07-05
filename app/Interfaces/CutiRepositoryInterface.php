<?php

namespace App\Interfaces;

interface CutiRepositoryInterface 
{
    public function getAllCuti($userId);
    public function getCutiById($userId, $cutiId);
    public function createCuti(array $cutiDetail);
}