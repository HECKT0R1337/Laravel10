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

        <br>
        <br>

      
        <div class="mb-2">
            <label for="status" class="form-label">Status</label>
            <select name="status">
                <option  value="enable">Enable</option>
                <option  value="disable">Disable</option>
            </select>
        </div>

      
        <div class="mb-2">
            <label for="show" class="form-label">Show Data</label>
            <input type="checkbox" name="show" value="1">
            <br>
            <label for="show" class="form-label">Hide Data</label>
            <input type="checkbox" name="show" value="0">
        </div>
      

        <input type="submit" value='create'>
    </form>

@endsection
{{-- @endsection == @stop --}}

{{-- @once can be used only once in a view and can be used before @push to make sure there 
will be one data push if data not changed or will be pushed if data changed. --}}

{{-- @push and @pushOnce can be only executed on this page based on @stack at header or footer or whatever --}}
{{-- @prepend can be executed before @stack happens with each refresh --}}
{{-- @prependOnce can be executed before @stack happens and only one time if data not changed --}}

@once
    @push('css2')
        <h3>Iam H3 from push</h3>

        {{-- <script>
            alert('test push and stack?')
        </script> --}}
    @endpush
@endonce



@prepend('css2')
    <h3>Iam H3 from prepend</h3>
@endprepend

@prependOnce('css2')
    <h3>Iam H3 from prependOnce</h3>
@endprependOnce
