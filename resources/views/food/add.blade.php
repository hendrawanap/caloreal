<!DOCTYPE html>
<html>

<head>
    <title>Tambah Makanan</title>
</head>

<body>
    <h3>Tambah Makanan</h3>

    <a href="/food"> Kembali</a>

    <br />
    <br />

    <form action="/food/store" method="post">
        {{ csrf_field() }}
        Nama Makanan <input type="text" name="foodname" required="required"> <br />
        Quantity <input type="number" name="quantity" required="required"> <br />
        Calorie <input type="number" name="calorie" required="required"> <br />
        Jenis Makanan <input type="text" name="type" required="required"> <br>
        <input type="submit" value="Simpan Data">
    </form>
</body>

</html>