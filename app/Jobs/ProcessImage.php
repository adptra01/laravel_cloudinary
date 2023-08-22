<?php

namespace App\Jobs;

use App\Models\Media;
use App\Models\User;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    // protected $userId;
    // protected $image;

    // public function __construct($userId, $image)
    public function __construct()
    {
        // $this->userId = $userId;
        // $this->image = $image;
    }

    public function handle()
    {
    //     $result = Cloudinary::upload($this->image['temp_path'], ['public_id' => 'image'.rand()]);

    //     $user = User::find($this->userId);
    //     $media = new Media([
    //         'file_url' => $result->getSecurePath(),
    //         'file_name' => $result->getFileName(),
    //         'file_type' => $result->getExtension(),
    //         'size' => $result->getSize(),
    //     ]);
    //     $user->media()->save($media);
    sleep(3);
    }
}
