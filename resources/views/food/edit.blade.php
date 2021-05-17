<!DOCTYPE html>
<html>

<head>
    <title>Edit Makanan</title>
</head>

<body>
    <h3>Edit Makanan</h3>

    <a href="/food"> Kembali</a>

    <br />
    <br />
    @foreach($foods as $f)
    <form action="/food/update" method="post">
        {{ csrf_field() }}
        <input type="hidden" name='id' value="{{$f->id}}"><br>
        Nama Makanan <input type="text" name="foodname" required="required" value="{{$f->foodname}}"> <br />
        Quantity <input type="number" name="quantity" required="required" value="{{$f->quantity}}"> <br />
        Calorie <input type="number" name="calorie" required="required" value="{{$f->calorie}}"> <br />
        Jenis Makanan <input type="text" name="type" required="required" value="{{$f->type}}"><br>
        <input type="submit" value="Simpan Data">
    </form>
    @endforeach
</body>

</html>