<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">

</head>

<body>

    <!-- Header & Alert -->
    <header class="container pt-5">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                <strong>Success</strong> {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger" role="alert">
                <strong>Failure</strong> {{ session('error') }}
            </div>
        @endif
    </header>

    <!-- Content -->
    <main class="container mt-5 p-auto rounded">
        <div class="card mb-5">
            <div class="card-header bg-white fw-bold text-center">Contoh Upload Image</div>
            <div class="card-body">
                <form action="{{ route('cloudinary.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="image" class="form-label">image</label>
                        <input type="file" class="form-control" name="image" id="image"
                            aria-describedby="helpId" placeholder="Enter your image" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                </form>
            </div>
        </div>
        <div class="card mb-5">
            <div class="card-header bg-white fw-bold text-center">Table Upload Image</div>
            <div class="card-body table-responsive">
                <table id="example" class="table table-striped nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Image</th>
                            <th>Model</th>
                            <th>File Name</th>
                            <th>File Type</th>
                            <th>File Size</th>
                            <th>File Url</th>
                            <th>File Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($medially as $no => $media)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td><img src="{{ $media->file_url }}" class="rounded-circle border border-primary" width="100px" height="100px" style="object-fit: cover" alt="image_upload"></td>
                                <td>{{ $media->medially_type }}</td>
                                <td>{{ $media->file_name }}</td>
                                <td>{{ $media->file_type }}</td>
                                <td>{{ $media->size }}</td>
                                <td>{{ $media->file_url }}</td>
                                <td>{{ $media->created_at }}</td>
                                <td>
                                    <div class="d-flex gap-4">
                                        <a class="btn btn-warning btn-sm"
                                            href="{{ route('cloudinary.show', $media->id) }}">Edit</a>
                                        <form action="{{ route('cloudinary.destroy', $media->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>


    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
    <script>
        $('#example').DataTable({
            responsive: true
        });
    </script>
</body>

</html>
