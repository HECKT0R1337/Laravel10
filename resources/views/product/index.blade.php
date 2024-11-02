<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiple Bootstrap Cards</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <style>
        .btn-xs {
            /* padding: 0.15rem 0.75rem; */
            /* font-size: 0.5rem; */
            /* font-weight: 900; */
        }
    </style>


    <div class="container mt-5">
        <div class="text-center">
            <div class="row justify-content-center">
                <a href="{{ route('product.create') }}"><button class="btn btn-sm btn-success my-3">Create
                        Product</button></a>

                @foreach ($cards as $card)
                    <!-- Each card container -->
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">{!! $card->name !!}</h5>
                                <p class="card-text">{{ $card->description }}</p>
                                <div class="d-flex justify-content-center gap-2 mt-3">

                                    <a href="{{ route('product.create') }}"><button
                                            class="btn btn-sm btn-success">Create</button></a>

                                    <a href="{{ route('product.show', $card->id) }}"><button
                                            class="btn btn-sm btn-secondary">Show</button></a>

                                    <button class="btn btn-sm btn-primary" data-bs-toggle="collapse"
                                        data-bs-target="#editForm{{ $card->id }}">Edit</button>

                                    <form action="{{ route('product.destroy', $card->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger btn-xs">Force Delete</button>
                                    </form>

                                    <form action="{{ route('product.softDelete', $card->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-warning btn-xs">Soft Delete</button>
                                    </form>
                                </div>

                                <!-- Edit Form (collapsed by default) -->
                                <div id="editForm{{ $card->id }}" class="collapse mt-3">
                                    <form action="{{ route('product.update', $card->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-2">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $card->name }}" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea name="description" class="form-control" rows="3" required>{{ $card->description }}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-primary mt-2">Save Changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>


    {{-- @dd($trashed); --}}

    @if ($trashed !== null && $trashed->isNotEmpty())
        <hr>
        <hr>
        <h1 class='text-center'>Trashed Products</h1>
        <div class="container mt-5">
            <div class="text-center">
                <div class="row justify-content-center">
                    @foreach ($trashed as $trash)
                        <!-- Each card container -->
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $trash->name }}</h5>
                                    <p class="card-text">{{ $trash->description }}</p>
                                    <p class="card-text">{{ $trash->deleted_at }}</p>
                                    <div class="d-flex justify-content-center gap-2 mt-3">
                                        <form action="{{ route('product.restore', $trash->id) }}" method="post">
                                            @csrf
                                            <button class="btn btn-sm btn-success">Restore</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif





    <!-- Bootstrap JS Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
