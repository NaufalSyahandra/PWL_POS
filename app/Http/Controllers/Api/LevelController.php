<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\m_levelModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Collection
    {
        return m_levelModel::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        return response()->json(m_levelModel::create($request->all()), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(m_levelModel $level): m_levelModel|Collection|array|null
    {
        return m_levelModel::find($level);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, m_levelModel $level): m_levelModel|Collection|array|null
    {
        $level->update($request->all());
        return m_levelModel::find($level);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(m_levelModel $level): JsonResponse
    {
        $level->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data Terhapus'
        ]);
    }
}
