Dokumentasi untuk Cloudinary Laravel Package di dalam file `README.md` mungkin akan terlihat seperti ini:

```markdown
# Cloudinary Laravel Package Documentation

This documentation provides information and usage examples for the Cloudinary Laravel Package.

## Installation

To install the Cloudinary Laravel Package, you can use Composer:

composer require cloudinary-labs/cloudinary-laravel
```

## Configuration

1. Publish the configuration file:
```bash
php artisan vendor:publish --provider="CloudinaryLabs\CloudinaryLaravel\ServiceProvider"
```

2. Add your Cloudinary credentials to the `.env` file:
```
CLOUDINARY_API_KEY=
CLOUDINARY_API_SECRET=
CLOUDINARY_UPLOAD_PRESET=
CLOUDINARY_NOTIFICATION_URL=
CLOUDINARY_URL=
```

## Usage

### Upload Image

You can use the Cloudinary Laravel package to easily upload images. Here's an example:

```php
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;

public function store(Request $request)
{
    $image = $request->file('image');
    try {
        $result = Cloudinary::upload($image->getRealPath(), ['public_id' => 'img'.rand()]);

        // Save the uploaded image info to your database
        // Create a new Media instance and save it to the user's media relationship

        return back()->with('success', 'Image uploaded to Cloudinary successfully');
    } catch (\Throwable $th) {
        return back()->with('error', 'Failed to upload image to Cloudinary');
    }
}
```

### Update Image

You can also update images using Cloudinary. Here's an example:

```php
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;

public function update($id, Request $request)
{
    $media = Media::find($id);
    $image = $request->file('image');
    try {
        Cloudinary::destroy($media->file_name);

        $result = Cloudinary::upload($image->getRealPath(), ['public_id' => 'img'.rand()]);

        // Update the image info in your database

        return back()->with('success', 'Image updated on Cloudinary successfully');
    } catch (\Throwable $th) {
        return back()->with('error', 'Failed to update image on Cloudinary');
    }
}
```

### Delete Image

You can delete images from Cloudinary using the Cloudinary Laravel package. Here's an example:

```php
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

public function destroy($id)
{
    $media = Media::find($id);
    Cloudinary::destroy($media->file_name);
    $media->delete();
    return back()->with('success', 'Image deleted from Cloudinary successfully');
}
```

## Support

For more information and advanced usage, refer to the official documentation of the Cloudinary Laravel Package.
```

Anda dapat menambahkan informasi lebih lanjut, seperti bagaimana mengatur alur kerja untuk aplikasi Anda, menggunakan fitur tambahan dari paket Cloudinary Laravel, atau menambahkan contoh-contoh lain yang relevan. Pastikan untuk menyesuaikan informasi ini dengan kebutuhan dan detail spesifik aplikasi Anda.
