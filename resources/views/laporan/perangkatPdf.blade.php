<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan Perangkat Nagari</title>
</head>
<body>
  <div>
    <span><br/></span>
    <center>
      <span style="font-style: bold; font-size: 20px;"><b>Laporan Perangkat Nagari</b></span><br/>
      <span style="font-style: bold; font-size: 20px;">Nagari Inderapura Barat</span>
      <br/><br/><br/>
    </center>
  <table align="center" style='border-collapse: collapse; width: 100%;' border="1">
    <tr>
      <th width="5%">No</th>
      <th width="">Nama</th>
      <th width="">Jabatan</th>
      <th width="">Mulai Tugas</th>
      <th width="20%">Status</th>
    </tr>
    @foreach($data as $key => $d)
    <tr>
      <td align="center">{{$key+1}}</td>
      <td>{{$d->nama}}</td>
      <td>{{$d->jabatan}}</td>
      <td align="center">{{$d->mulai_tugas}}</td>
      <td align="center">{{$d->status}}</td>
    </tr>
    @endforeach
  </table>
</body>
</html>
