
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

<h1>Data Siswa yang belum memilih</h1>

<table id="customers">
  <tr>
    <th>No</th>
    <th>Name</th>
    <th>NISN</th>
    <th>Role</th>
    <th>Status</th>
  </tr>
  @php
      $no=1;
  @endphp
  @foreach ($data as $users)
  <tr>
      <td>{{ $no++}}</td>
      <td>{{ $users->name }}</td>
      <td>{{ $users->nisn }}</td>
      <td>{{ $users->role }}</td>
      <td>{{ $users->status}}</td>
  </tr>
    @endforeach
</table>

</body>
</html>


