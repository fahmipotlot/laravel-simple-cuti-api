<?php

namespace App\Http\Controllers\Api;

use App\Interfaces\CutiRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Http\Requests\StoreCuti;
use Auth;

class CutiController extends Controller
{
    public function __construct(CutiRepositoryInterface $cutiRepository) 
    {
        $this->cutiRepository = $cutiRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        return response()->json([
            'data' => $this->cutiRepository->getAllcuti($user_id)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreCuti  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCuti $request)
    {
        $data = $request->only([
            'start_at',
            'end_at',
            'reason'
        ]);

        $data['user_id'] = Auth::user()->id;

        return response()->json(
            [
                'data' => $this->cutiRepository->createCuti($data)
            ],
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_id = Auth::user()->id;
        return response()->json([
            'data' => $this->cutiRepository->getCutiById($user_id, $id)
        ]);
    }
}
