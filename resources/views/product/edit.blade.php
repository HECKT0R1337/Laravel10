@extends('index')
@section('content')
{{-- 
<form action="{{route('product.update',$card->id)}}" method="POST">
    @csrf
    @method('put')
    <input type="text" name='name' value='{{$card->name}}'>
    <hr>
    <input type="text" name='description' value='{{$card->description}}'>

    <input type="submit" value='Update'>
</form> --}}

    <div class="container mt-5">
        <div class="text-center">
            <div class="row justify-content-center">
                <!-- Each card container -->
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body text-center">
                            <h5 class="card-title">{!! $card->name !!}</h5>
                            <p class="card-text">{!! $card->description !!}</p>

                            <!-- Buttons -->
                            <div class="d-flex justify-content-center gap-2 mt-3">
                                <a href="{{ route('product.create') }}" class="btn btn-sm btn-success">Add</a>
                                <button class="btn btn-sm btn-primary" data-bs-toggle="collapse"
                                    data-bs-target="">Edit</button>
                                <button class="btn btn-sm btn-danger btn-xs">Soft Delete</button>
                            </div>

                            <!-- Edit Form (collapsed by default) -->
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

                                <div class="mb-2">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status">
                                        <option  id='status' value="enable" @selected($card->status == 'enable')>Enabled</option>
                                        <option  id='status' value="disable" @selected($card->status == 'disable')>Disabled</option>
                                    </select>
                                </div>
                    
                                <div class="mb-2">
                                    <label for="show" class="form-label">Show Data</label>
                                    <input type="radio" name="show" value="1" id="show" @checked($card->show == 1 ) >
                                    <br>
                                    <label for="hide" class="form-label">Hide Data</label>
                                    <input type="radio" name="show" value="0" id="hide" @checked($card->show == 0 ) >
                                </div>

                                <button type="submit" class="btn btn-sm btn-primary mt-2">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
