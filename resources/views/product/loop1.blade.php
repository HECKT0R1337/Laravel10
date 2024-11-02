<div class="col-md-6 col-lg-4 mb-4">
    <div class="card">
        <div class="card-body text-center">
            <h5 class="card-title">{!! $card->name !!}</h5>
            <p class="card-text">{!! $card->description !!}</p>
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
                            value="{{ $card->plain_name }}" required>
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3" required>{{ $card->plain_description }}</textarea>
                        @error('description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary mt-2">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
