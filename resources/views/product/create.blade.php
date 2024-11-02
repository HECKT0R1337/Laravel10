
<form action="{{route('product.store')}}" method="POST">
    @csrf
    <input type="text" name='name' placeholder='name here'>
    <hr>
    <input type="text" name='description' placeholder='description here'>

    <input type="submit" value='create'>
</form>