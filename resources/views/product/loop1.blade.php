{{-- <style>
input[type="radio"] {
    appearance: auto;
    -webkit-appearance: radio;
    -moz-appearance: radio;
}
</style> --}}
<div class="col-md-6 col-lg-4 mb-4">
    <div class="card">
        <div class="card-body text-center">
            <h5 class="card-title">{!! $card->name !!}</h5>
            <p class="card-text">{!! $card->description !!}</p>


            <div class="mb-2">
                <label for="status" class="form-label">Status</label>
                <select name="status">
                    <option value="enable">{{ $card->status == 'enable' ? 'Enabled' : 'Disabled' }}</option>
                </select>
            </div>


            <p class="card-text">Visible :{{ $card->show== 1 ?'Show':'Hide' }}</p>

{{--             
            <div class="mb-2">
                <label for="show" class="form-label">Show Data</label>
                <input id="show"  type="radio" name="show[{{ $card->id }}]" value="1" {{ $card->show == 1 ? 'checked' : '' }} disabled >
                <br>
                <label for="hide" class="form-label">Hide Data</label>
                <input id="hide"  type="radio" name="show[{{ $card->id }}]" value="0" {{ $card->show == 0 ? 'checked' : '' }} disabled >
            </div> --}}


            {{-- {{$card->show==1?'checked':''}} --}}

            <div class="d-flex justify-content-center gap-2 mt-3">

                <a href="{{ route('product.create') }}"><button class="btn btn-sm btn-success">Create</button></a>

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
            <div id="editForm{{ $card->id }}" class="collapse my-3 border border-primary  ">
                <form action="{{ route('product.update', $card->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-2">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $card->plain_name }}"
                            required>
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


                    <div class="mb-2">
                        <label for="status" class="form-label">Status</label>
                        <select name="status">
                            <option  id='status' value="enable">Enabled</option>
                            <option  id='status' value="disable">Disabled</option>
                        </select>
                    </div>
        
                    <div class="mb-2">
                        <label for="show" class="form-label">Show Data</label>
                        <input type="radio" name="show" value="1" id="show" {{ $card->show == 1 ? 'checked' : '' }} >
                        <br>
                        <label for="hide" class="form-label">Hide Data</label>
                        <input type="radio" name="show" value="0" id="hide" {{ $card->show == 0 ? 'checked' : '' }} >
                    </div>
        
                    <button type="submit" class="btn btn-sm btn-primary my-2">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
