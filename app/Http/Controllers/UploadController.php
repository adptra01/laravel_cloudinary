<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessImage;
use App\Models\Media;
use App\Models\User;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        $user = User::factory()->create();
        $image = $request->file('image');
        try {
            // Menggunakan folder tertentu
            // $obj = Cloudinary::upload($file->getRealPath(),['folder'=>'picture']);

            $result = Cloudinary::upload($image->getRealPath(), ['public_id' => 'img'.rand()]);

            $media = new Media([
                'file_url' => $result->getSecurePath(),
                'file_name' => $result->getPublicId(),
                'file_type' => $result->getExtension(),
                'size' => $result->getSize(),
            ]);
            $user->media()->save($media);

            // ProcessImage::dispatch($user->id, $image);

            return back()->with('success', 'Upload image ke Cloudinary Berhasil');
        } catch (\Throwable $th) {
            return back()->with('error', 'Upload image ke Cloudinary gagal');
        }

    }

    public function show($id)
    {
        return view('show', [
            'media' => Media::find($id),
        ]);
    }

    public function update($id, Request $request)
    {
        $media = Media::find($id);
        $image = $request->file('image');
        try {
            // Menggunakan folder tertentu
            // $obj = Cloudinary::upload($file->getRealPath(),['folder'=>'picture']);
            Cloudinary::destroy($media->file_name);

            $result = Cloudinary::upload($image->getRealPath(), ['public_id' => 'img'.rand()]);

            $media->update([
                'file_url' => $result->getSecurePath(),
                'file_name' => $result->getPublicId(),
                'file_type' => $result->getExtension(),
                'size' => $result->getSize(),
            ]);
            return back()->with('success', 'Ubah image ke Cloudinary berhasil');

        } catch (\Throwable $th) {
            return back()->with('error', 'Upload image ke Cloudinary gagal');
        }
    }

    public function destroy($id)
    {
        $media = Media::find($id);
        Cloudinary::destroy($media->file_name);
        $media->delete();
        return back()->with('success', 'Hapus image ke Cloudinary berhasil');
        // dd($file);

    }
}
