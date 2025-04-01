<?php

namespace App\Http\Controllers;

use App\Helpers\DefaultVideoHelper;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Tests\Unit\VideosTest;

class VideosController extends Controller
{
    /**
     * Associa el controlador amb la classe de test corresponent.
     */
    public function testedBy()
    {
        return VideosTest::class;
    }

    /**
     * Mostra un vídeo concret.
     */
    public function show($id)
    {
        $video = Video::find($id);

        if (!$video) {
            return response()->json([
                'message' => 'Video not found'
            ], 404);
        }

        return view('videos.show', compact('video'));
    }

    /**
     * Mostra tots els vídeos.
     */
    public function index()
    {
        $videos = Video::latest()->paginate(10); // Ara retorna els vídeos ordenats per data i paginats

        return view('videos.index', compact('videos'));
    }

    /**
     * Desa un nou vídeo a la base de dades.
     */
    public function store(Request $request)
    {
        $this->authorize('manage-videos');

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'url' => 'required|url',
            'published_at' => 'nullable|date',
        ]);

        $video = Video::create($validatedData);

        return redirect()->route('videos.index')->with('success', 'Vídeo creat correctament!');
    }

    /**
     * Mostra el formulari per editar un vídeo.
     */
    public function edit(Video $video): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $this->authorize('manage-videos');

        /** @var view-string $view */
        $view = 'videos.edit';

        return view($view, compact('video'));
    }

    /**
     * Actualitza un vídeo existent.
     */
    public function update(Request $request, Video $video): \Illuminate\Http\RedirectResponse
    {
        $this->authorize('manage-videos');

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'url' => 'required|url',
            'published_at' => 'nullable|date',
        ]);

        $video->update($validatedData);

        return redirect()->route('videos.index')->with('success', 'Vídeo actualitzat correctament!');
    }

    /**
     * Elimina un vídeo de la base de dades.
     */
    public function destroy(Video $video)
    {
        $this->authorize('manage-videos');

        $video->delete();

        return redirect()->route('videos.index')->with('success', 'Vídeo eliminat correctament!');
    }

    private function authorize(string $string)
    {
        if (!Gate::allows($string)) {
            abort(403);
        }
    }
}
