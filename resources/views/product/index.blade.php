@extends('index')
@section('content')
    <div class="container mt-5">
        <div class="text-center">
            <div class="row justify-content-center">
                <a href="{{ route('product.create') }}"><button class="btn btn-sm btn-success my-3">Create
                        Product</button></a>

                @each('product.loop1', $cards, 'card', 'product.empty')


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

                    @each('product.loop2', $trashed, 'trash', 'product.empty')


                </div>
            </div>
        </div>
    @endif
@endsection

{{-- @push means this css code inside will only executed on this page and there is @stack at header --}}
{{-- @push('css') 
    <style>
        .btn-xs {
            padding: 0.15rem 0.75rem;
            font-size: 0.5rem;
            font-weight: 900;
        }
    </style>
@endpush --}}



{{-- @pushIf is same as @push but it only executed if the condition is true and there is @stack at header. --}}
@pushIf(true,'css')
<style>
    .btn-xs {
        padding: 0.15rem 0.75rem;
        font-size: 0.5rem;
        font-weight: 900;
    }
</style>
@endpushIf
