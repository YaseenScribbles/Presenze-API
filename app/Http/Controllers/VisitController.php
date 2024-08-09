<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use App\Http\Requests\StoreVisitRequest;
use App\Http\Requests\UpdateVisitRequest;
use App\Http\Resources\VisitResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'search_term' => 'string'
        ]);

        try {
            //code...
            $query = "select v.id,v.shop_id,c.shop_name,v.location,v.purpose,v.is_active,v.user_id,u.name
            from visits v
            inner join contacts c on c.id = v.shop_id
            inner join users u on u.id = v.user_id
            where v.is_active = 1 and c.is_active = 1 and
            v.user_id = $request->user_id";

            if ($request->has('search_term') && $request->search_term != '') {
                $query .= " and c.shop_name like '%$request->search_term%'";
            }

            $visits = DB::select($query);
            $perPage = 10;
            $page = $request->has('page') ? $request->page : 1;
            $offset = ($page - 1) * $perPage;
            $total = count($visits);
            $visits = array_slice($visits, $offset, $perPage);

            return response()->json([
                'visits' => VisitResource::collection($visits),
                'currentPage' => $page,
                'perPage' => $perPage,
                'total' => $total
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVisitRequest $request)
    {
        $data = $request->validated();

        try {
            //code...
            Visit::create($data);
            return response()->json(['message' => 'Visit saved successfully']);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Visit $visit)
    {
        try {
            //code
            return new VisitResource($visit);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVisitRequest $request, Visit $visit)
    {
        try {
            //code...
            $data = $request->validated();
            $visit->update($data);
            return response()->json(['message' => 'Visit updated successfully']);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visit $visit)
    {
        try {
            //code...
            $visit->delete();
            return response()->json(['message' => 'Deleted successfully']);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
