<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan Penduduk</title>
</head>
<body>
  <div>
    <span><br/></span>
    <center>
      <span style="font-style: bold; font-size: 20px;"><b>Laporan Penduduk</b></span><br/>
      <span style="font-style: bold; font-size: 20px;">Nagari Inderapura Barat</span>
      <br/><br/><br/>
    </center>
  <table align="center" style='border-collapse: collapse; width: 100%;' border="1">
    <tr>
      <th width="5%">No</th>
      <th width="25%">NIK</th>
      <th width="">Nama</th>
      <th>No HP</th>
      <th width="5%">P/L</th>
      <th>Tgl Lahir</th>
    </tr>
    @foreach($data as $key => $d)
    <tr>
      <td align="center">{{$key+1}}</td>
      <td align="center">{{$d->nik}}</td>
      <td>{{$d->nama}}</td>
      <td align="center">{{$d->nohp}}</td>
      <td align="center">
        @if($d->jenkel == "Perempuan")
          P
        @else
          L
        @endif
      </td>
      <td align="center">{{$d->tgl_lahir}}</td>
    </tr>
    @endforeach
  </table>
</body>
</html>
