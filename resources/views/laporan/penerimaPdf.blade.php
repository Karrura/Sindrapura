<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan Penerima Bantuan</title>
</head>
<body>
  <div>
    <span><br/></span>
    <center>
      <span style="font-style: bold; font-size: 20px;"><b>Laporan Penerima Bantuan</b></span><br/>
      <span style="font-style: bold; font-size: 20px;">Nagari Inderapura Barat</span>
      <br/><br/><br/>
    </center>
  <table align="center" style='border-collapse: collapse; width: 100%;' border="1">
    <tr>
      <th width="5%">No</th>
      <th width="">Nama</th>
      <th width="">Bantuan</th>
      <th width="50%">Keterangan</th>
    </tr>
    @foreach($data as $key => $d)
    <tr>
      <td align="center">{{$key+1}}</td>
      <td>{{$d->nama}}</td>
      <td>{{$d->nama_bantuan}}</td>
      <td align="justify">{{$d->keterangan}}</td>
    </tr>
    @endforeach
  </table>
</body>
</html>
