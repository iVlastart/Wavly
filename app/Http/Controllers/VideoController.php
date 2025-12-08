<?php

namespace App\Http\Controllers;

use App\Models\Video;
use FFMpeg\Format\Video\X264;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class VideoController extends Controller
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
    public function create():View
    {
        return view('video.create.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'src' => 'required|file|mimetypes:video/mp4|max:5120000',
            'title' => 'required|string|max:500',
            'visibility' => 'required|in:public,private',
        ]);
        $vidPath = 'videos/'.$data['title'].'-'.Auth::user()->name;
        $reqFile = $request->file('src');
        $outputDir = storage_path('app/public/'.$vidPath);

        if(!file_exists($outputDir)){
            mkdir($outputDir, 0777, true);
        }

        $filenameWithoutExt = pathinfo($reqFile->getClientOriginalName(), PATHINFO_FILENAME);
        $filename = $filenameWithoutExt.'.mp4';
        $reqFile->move($outputDir, $filename);
        $data['src'] = $vidPath.'/'.$filename;

        FFMpeg::fromDisk('public')
            ->open($data['src'])
            ->getFrameFromSeconds(0)
            ->export()
            ->toDisk('public')
            ->save($vidPath.'/'.$filename.'-preview.webp');
        
        $data['user_id'] = Auth::id();
        Video::create($data);
        return redirect()->route('home')->with('success', 'Video uploaded successfully.');
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
