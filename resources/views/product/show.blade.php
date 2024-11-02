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
                <!-- Each card container -->
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $card->name }}</h5>
                            <p class="card-text">{{ $card->description }}</p>

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

    <!-- Bootstrap JS Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
