Tentu, berikut ini adalah versi yang telah diperbarui dari dokumen `README.md` dengan tambahan contoh penggunaan pada model `Media`:

```markdown
# Cloudinary Laravel Package Documentation

Welcome to the documentation for the Cloudinary Laravel Package. This guide will help you understand how to install, configure, and use the Cloudinary Laravel integration in your Laravel applications.

## Installation

To install the Cloudinary Laravel Package, use Composer:

```bash
composer require cloudinary-labs/cloudinary-laravel
```

## Configuration

1. Publish the configuration file:
```bash
php artisan vendor:publish --provider="CloudinaryLabs\CloudinaryLaravel\CloudinaryServiceProvider" --tag="cloudinary-laravel-migration"
```

2. Add your Cloudinary credentials to the `.env` file:
```
CLOUDINARY_API_KEY=
CLOUDINARY_API_SECRET=
CLOUDINARY_UPLOAD_PRESET=
CLOUDINARY_NOTIFICATION_URL=
CLOUDINARY_URL=
```

3. Connect models, for example using the `User` and `Media` models from the published vendor migration:
```
class User extends Model
{
    use MediaAlly;

    ...

    public function media()
    {
        return $this->morphMany(Media::class, 'medially');
    }
}

class Media extends Model
{
    ...

    // protected $guarded = [];

    public function medially()
    {
        return $this->morphTo();
    }
}

```


## Usage

### Uploading Images

You can easily upload images using the Cloudinary Laravel package. Here's an example:

```php
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use App\Models\Media; // Add this line

public function store(Request $request)
{
    $image = $request->file('image');
    try {
        $result = Cloudinary::upload($image->getRealPath(), ['public_id' => 'img'.rand()]);

        // Save uploaded image details to your database
        $media = new Media([
            'file_url' => $result->getSecurePath(),
            'file_name' => $result->getPublicId(),
            'file_type' => $result->getExtension(),
            'size' => $result->getSize(),
        ]);
        $media->save();

        return back()->with('success', 'Image uploaded to Cloudinary successfully');
    } catch (\Throwable $th) {
        return back()->with('error', 'Failed to upload image to Cloudinary');
    }
}
```

### Updating Images

You can also update images using Cloudinary. Here's an example:

```php
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use App\Models\Media; // Add this line

public function update($id, Request $request)
{
    $media = Media::find($id);
    $image = $request->file('image');
    try {
        Cloudinary::destroy($media->file_name);

        $result = Cloudinary::upload($image->getRealPath(), ['public_id' => 'img'.rand()]);

        // Update image details in your database
        $media->update([
            'file_url' => $result->getSecurePath(),
            'file_name' => $result->getPublicId(),
            'file_type' => $result->getExtension(),
            'size' => $result->getSize(),
        ]);

        return back()->with('success', 'Image updated on Cloudinary successfully');
    } catch (\Throwable $th) {
        return back()->with('error', 'Failed to update image on Cloudinary');
    }
}
```

### Deleting Images

You can delete images from Cloudinary using the Cloudinary Laravel package. Here's an example:

```php
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Models\Media; // Add this line

public function destroy($id)
{
    $media = Media::find($id);
    Cloudinary::destroy($media->file_name);
    $media->delete();
    return back()->with('success', 'Image deleted from Cloudinary successfully');
}
```

## Need Help?

For more information and advanced usage, please refer to the official documentation of the Cloudinary Laravel Package.
```

Pastikan Anda menyunting atau menambahkan bagian yang relevan jika diperlukan, dan pastikan informasinya akurat sesuai dengan kebutuhan aplikasi Anda.
