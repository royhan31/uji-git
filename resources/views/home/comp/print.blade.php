<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Laporan</title>
    <style type="text/css">
      table{
        border: 1px solid;
        border-collapse: collapse;
        width: 70%;
        margin: 0 auto;
        text-align: left;
      }
      tr th{
        border: 1px solid;
      }  tr td{
          border: 1px solid;
        }

    </style>
  </head>
  <body>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Loker</th>
          <th>Nama Pelamar</th>
        </tr>
      </thead>
      <tbody>
        @php($no = 1)
        @foreach($lokers as $loker)
        <tr>
          <td>{{$no}}</td>
          <td>{{$loker->name}}</td>
        </tr>
        @php($no++)
        @endforeach
      </tbody>
    </table>
  </body>
</html>
