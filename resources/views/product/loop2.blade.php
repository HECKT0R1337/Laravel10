<!-- Each card container -->
<div class="col-md-6 col-lg-4 mb-4">
    <div class="card" style="width: 18rem;">
        <div class="card-body text-center">
            <h5 class="card-title">{!! $trash->name !!}</h5>
            <p class="card-text">{!! $trash->description !!}</p>
            <p class="card-text">{!! $trash->deleted_at !!}</p>
            <div class="d-flex justify-content-center gap-2 mt-3">
                <form action="{{ route('product.restore', $trash->id) }}" method="post">
                    @csrf
                    <button class="btn btn-sm btn-success">Restore</button>
                </form>
            </div>
        </div>
    </div>
</div>
