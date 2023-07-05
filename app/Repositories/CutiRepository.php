<?php

namespace App\Repositories;

use App\Interfaces\CutiRepositoryInterface;
use App\Models\Cuti;

class CutiRepository implements CutiRepositoryInterface 
{
    public function getAllCuti($userId) 
    {
        return Cuti::where('user_id', $userId)->paginate(5);
    }

    public function getCutiById($userId, $cutiId) 
    {
        return Cuti::with('approvedBy')->where(['user_id' => $userId, 'id' => $cutiId])->firstOrFail();
    }

    public function createCuti(array $CutiDetail) 
    {
        return Cuti::create($CutiDetail);
    }
}
