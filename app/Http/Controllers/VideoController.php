<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::all();
        return view('video.index', compact('videos'));
    }

    public function create()
    {
        return view('video.create');
    }

    public function store(Request $request)
    {
        // Validate the data sent from the form
        $request->validate([
            'video' => ['required', 'file', 'mimetypes:video/mp4,video/mpeg,video/quicktime', 'max:10240'], // Max 10 megabyte
            'caption' => 'required',
        ]);

        // Store the newly uploaded video
        $video = new Video();
        $video->created_by = auth()->id(); // The currently logged-in user
        $video->video = $request->file('video')->store('videos'); // Store the video inside the 'videos' folder
        $video->caption = $request->caption;
        $video->save();

        return redirect()->route('video.index')->with('success', 'Video berhasil disimpan!');
    }

    public function destroy($id)
    {
        $video = Video::findOrFail($id);

        // Delete the video file from storage before deleting the video
        if ($video->video) {
            Storage::delete($video->video);
        }

        if ($video->delete()) {
            return redirect()->route('video.index')->with('success', 'Video berhasil dihapus!');
        }

        return redirect()->route('video.index')->with('error', 'Gagal menghapus video.');
    }
}
