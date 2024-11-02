@extends('index')
@section('content')

{{-- @if (session()->has('success'))
    <p class="text-success">{{ session()->get('success') }}</p>
@endif --}}

{{-- How to show error #1 --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



<form action="{{ route('product.store') }}" method="POST">
    @csrf
    <input type="text" name='name' placeholder='name here' value="{{ old('name') }}">
    {{-- How to show error #2 --}}
    @error('name')
        <p class="text-danger">{{ $message }}</p>
    @enderror
    <hr>
    <input type="text" name='description' placeholder='description here' value="{{ old('description') }}">
    @error('description')
        <p class="text-danger">{{ $message }}</p>
    @enderror
    <input type="submit" value='create'>
</form>

@endsection
{{-- @endsection == @stop --}}


@push('js')
    <script>
        alert('test push and stack?')
    </script>
@endpush