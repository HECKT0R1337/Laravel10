@extends('index')
@section('content')
    <div class="container mt-5">
        <div class="text-center">
            <div class="row justify-content-center">
                <!-- Each card container -->
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card" style="width: 18rem;">
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
                            
                            <!-- Buttons -->
                            <div class="d-flex justify-content-center gap-2 mt-3">
                                <a href="{{ route('product.index') }}"><button
                                        class="btn btn-sm btn-primary">Back</button></a>
                                <a href="{{ route('product.edit', $card->id) }}"><button
                                        class="btn btn-sm btn-success">Edit</button></a>

                                <form action="{{ route('product.destroy', $card->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('product.destroy', $card->id) }}"><button
                                            class="btn btn-sm btn-danger">Delete</button></a>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
