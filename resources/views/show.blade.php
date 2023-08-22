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
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="border p-3 text-center rounded">
                            <img src="{{ $media->file_url }}" class="img-fluid rounded-top" width="300px" height="300px" style="object-fit: cover;" alt="">
                        </div>
                    </div>
                    <div class="col-md">
                        <h5 class="fw-bold">
                            Details
                        </h5>
                        <ol>
                            <li><span>{{ $media->medially_type }}</span></li>
                            <li><span>{{ $media->file_url }}</span></li>
                            <li><span>{{ $media->file_name }}</span></li>
                            <li><span>{{ $media->file_type }}</span></li>
                            <li><span>{{ $media->size }}</span></li>
                            <li><span>{{ $media->created_at }}</span></li>
                        </ol>
                        <div class="card mb-5">
                            <div class="card-header bg-white fw-bold text-center">Contoh Upload Image</div>
                            <div class="card-body">
                                <form action="{{ route('cloudinary.update', $media->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="mb-3">
                                        <label for="image" class="form-label">image</label>
                                        <input type="file" class="form-control" name="image" id="image"
                                            aria-describedby="helpId" placeholder="Enter your image" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
