<?php

namespace App\Http\Controllers;

use App\Models\CheckOut;
use App\Http\Requests\StoreCheckOutRequest;
use App\Http\Requests\UpdateCheckOutRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user_id = $request->query('user_id');
        $checkins = CheckOut::where('user_id','=',$user_id)
        ->where('is_active','=',1)
        ->orderBy('created_at','desc')
        ->get();
        return response()->json([$checkins],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCheckOutRequest $request)
    {
        try {
            $data =  $request->validated();

            $image = $request->file('image');
            $path =  $image->store('images', 'public');

            CheckOut::create([
                'user_id' => $data['user_id'],
                'location' => $data['location'],
                'image_path' => $path,
                'created_at' => Carbon::now()
            ]);

            return response()->json(['message' => 'Checked out successful'], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CheckOut $checkOut)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCheckOutRequest $request, CheckOut $checkOut)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CheckOut $checkOut)
    {
        //
    }
}
