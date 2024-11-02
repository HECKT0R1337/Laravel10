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




    <div class="container mt-5">
        <div class="text-center">
            <div class="row justify-content-center">
                @foreach ($cards as $card)

                    <!-- Each card container -->
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $card->name }}</h5>
                                <p class="card-text">{{ $card->description }}</p>
    
                                <!-- Buttons -->
                                <div class="d-flex justify-content-center gap-2 mt-3">

                                    {{-- <a href="{{ route('product.create') }}"><button class="btn btn-sm btn-success">Create</button></a> --}}
                                    <button class="btn btn-sm btn-success" data-bs-toggle="collapse" data-bs-target="#addForm{{ route('product.create') }}">Add</button>

                                    <a href="{{ route('product.show', $card->id) }}"><button class="btn btn-sm btn-secondary">Show</button></a>

                                    <button class="btn btn-sm btn-primary" data-bs-toggle="collapse" data-bs-target="#editForm{{ $card->id }}">Edit</button>

                                    <form action="{{route('product.destroy',$card->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                            <a href="{{ route('product.destroy',$card->id) }}"><button class="btn btn-sm btn-danger">Delete</button></a>
                                        </form>
                                        
                                </div>
    
                                <!-- Edit Form (collapsed by default) -->
                                <div id="editForm{{ $card->id }}" class="collapse mt-3">
                                    <form action="{{ route('product.update', $card->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-2">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control" value="{{ $card->name }}" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea name="description" class="form-control" rows="3" required>{{ $card->description }}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-primary mt-2">Save Changes</button>
                                    </form>
                                </div>

                                <div id="addForm{{ route('product.create') }}" class="collapse mt-3">
                                    <form action="{{ route('product.create') }}" method="POST">
                                        @csrf
                                        <div class="mb-2">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="add name here" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea name="description" class="form-control" rows="3" placeholder="add description here"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-success mt-2">Submit</button>
                                    </form>
                                </div>

    
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>


    <!-- Bootstrap JS Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
