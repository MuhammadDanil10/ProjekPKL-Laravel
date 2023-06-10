
<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>
<h1></h1>

<table id="customers">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Status</th>
    </tr>
    @php
        $no=1
    @endphp
    @if ($data !== null)
    @foreach ($data as $item)
        @if ($item->status == 1 || $item->status == 2 || $item->status == 3)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->status }}</td>
            </tr>
        @endif
    @endforeach
    @endif
</table>

</body>
</html>


