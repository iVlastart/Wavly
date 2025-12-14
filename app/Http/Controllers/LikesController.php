<?php

namespace App\Http\Controllers;

use App\Models\Likes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = $request->validate([
            'id'=>'required|integer|exists:videos,id',
        ]);
        $liked = false;
        $like = Likes::where('video_id',$data['id'])
                    ->where('user_id', Auth::id())
                    ->exists();
        if($like)
        {
            //the like exists, needs removal
            $like->delete();
        }
        else
        {
            //the like does not exist, needs addition
            Likes::create([
                'video_id' => $data['id'],
                'user_id' => Auth::id(),
            ]);
            $liked = true;
        }

        return response()->json([
            'liked'=>$liked,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
