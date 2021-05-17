<!DOCTYPE html>
<html>

<head>
    <title>Makanan</title>
</head>

<body>
    <h3>Data Makanan</h3>

    <a href="/food/add"> + Tambah Makanan</a>

    <br /><S></S>
    <br />

    <table border="1">
        <tr>
            <th>id</th>
            <th>foodname</th>
            <th>quantity</th>
            <th>calorie</th>
            <th>type</th>
            <th>created</th>
            <th>updated</th>
        </tr>
        @foreach($foods as $f)
        <tr>
            <td>{{ $f->id}}</td>
            <td>{{ $f->foodname}}</td>
            <td>{{ $f->quantity}}</td>
            <td>{{ $f->calorie}}</td>
            <td>{{ $f->type}}</td>
            <td>{{ $f->created_at}}</td>
            <td>{{ $f->updated_at}}</td>
            <td>
                <a href="/food/edit/{{ $f->id }}">Edit</a>
                |
                <a href="/food/delete/{{ $f->id }}">Hapus</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>

</html>