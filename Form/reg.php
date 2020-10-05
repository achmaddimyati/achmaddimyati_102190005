<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Halaman Hasil Register</title>
    <style media="screen">
      table{
        background-image: url('Desert.jpg');
        border-radius: 25px;
        padding: 20px 20px
      }
      th{
        text-decoration:underline;
        text-indent: inherit;
        font-size: 23px;
        color: yellow;  
      }
      tr{
        font-size: 23px;
      }
    </style>
  </head>
  <center><body>
    <?php
    if(isset($_POST['register'])){
      $nama=$_POST['nama'];
      $alamat=$_POST['alamat'];
      $jk=$_POST['jenis_kelamin'];
      $u_name=$_POST['username'];
      $pass=$_POST['password'];
      $hobi=$_POST['hobi'];

      echo "
      <table cellpadding='5'>
        <thead>
          <th colspan='3'>DETAIL IDENTITAS ANDA :<th>
        </thead>
        <tbody>
          <tr>
            <td>Nama</td>
            <td> : </td>
            <td>$nama</td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td> : </td>
            <td>$alamat</td>
          </tr>
          <tr>
            <td>Jenis Kelamin</td>
            <td> : </td>
            <td>$jk</td>
          </tr>
          <tr>
            <td>Username</td>
            <td> : </td>
            <td>$u_name</td>
          </tr>
          <tr>
            <td>Password</td>
            <td> : </td>
            <td>$pass</td>
          </tr>
          <tr>
            <td>Hobi</td>
            <td> : </td>
            <td>";
              foreach ($hobi as $item) {
                echo "$item<br/>";
              }
            echo "</td>";
          echo"</tr>
        </tbody>
      </table>";

    }?>
  </body></center>
</html>
