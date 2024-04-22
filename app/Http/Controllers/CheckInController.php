<?php

namespace App\Http\Controllers;

use App\Models\CheckIn;
use App\Http\Requests\StoreCheckInRequest;
use App\Http\Requests\UpdateCheckInRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckInController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user_id = $request->query('user_id');
        $checkins = CheckIn::where('user_id','=',$user_id)
        ->orderBy('created_at','desc')
        ->get();
        return response()->json([$checkins],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCheckInRequest $request)
    {
        try {
            //code...
            $data =  $request->validated();

            $image = $request->file('image');
            $path =  $image->store('images', 'public');

            CheckIn::create([
                'user_id' => 1,
                'location' => $data['location'],
                'image_path' => $path,
                'created_at' => Carbon::now()
            ]);

            return response()->json(['message' => 'Checked in successful'], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CheckIn $checkIn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCheckInRequest $request, CheckIn $checkIn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CheckIn $checkIn)
    {
        //
    }
}
