<?php include('config.php'); ?>
<!DOCTYPE HTML>
<html>
<head></head>
<title></title>
<h1>Operator Matematika</h1>
<body>

<form    methot="get" action="">
ID<br>
<input type ="text" name="id" readonly placeholder ="sudah terisi"><br>
A<br>
<input type="number" name="a"><br>
B <br>
<input type="number" name="b"><br>
<input type="submit" name="submit" value="Hitung">
</form>

<div class="container" style="margin-top:50px"> 
  <center> <h2>DATA HASIL PERHITUNGAN MATEMATIKA</h2>  </center> 
   <hr  >  
   <center>
   <table border='1'  width="20px">   
   
    <tr>   
<th>ID.</th>    
    <th>A</th>   
        <th>B</th>  
    <th>Hasil</th>   
        <th>Keterangan</th>  
        </tr> 
        </thead>  
        <tbody> 
   <?php

   include('config.php');
// Action form
if (isset($_GET['submit'])) {
    // Input form
    $id          =$_GET['id'];
    $a           = $_GET['a'];
    $b           = $_GET['b'];


    /* Rumus
    */   
    // Hitung 
    $c      = ($a + $b);
 
    // Mencetak hasil
    
    echo "<h3>Hasil perhitungan </h3>"; //ini cuma buat penamaan doang
    // Menghitung dan mencetak kesimpulan
    
    echo $c;
    echo "<h3>Keterangan </h3>";
        if($c < 10) {
        $keterangan ="A";
    }elseif ($c < 20 ) {
        $keterangan ="B";
    }elseif ($c > 20 ) {
        $keterangan ="C";
    }elseif ($c < 0 ) {
        $keterangan ="D";
    } 


    $sql = mysqli_query($koneksi, "INSERT INTO hasilopertor (id, a, b, c, keterangan) 
    VALUES('$id', '$a', '$b', '$c','$keterangan')") or die(mysqli_error($koneksi));

echo '</div>';
}
    // closing div

?>
  


<?php   include('config.php');   //query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar  
 $sql = mysqli_query($koneksi, "SELECT a.id, a.a, a.b, a.c, a.keterangan
        from hasilopertor as a") 
	or die(mysqli_error($koneksi)); 
    //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...  
        if(mysqli_num_rows($sql) > 0){      //membuat variabel     
        $id = 1;      //melakukan perulangan while dengan dari dari query $sql 
        while($data = mysqli_fetch_assoc($sql))
        {       //menampilkan data perulangan      
        echo '      
        <tr>     
        <td>'.$data['id'].'</td> 
        <td>'.$data['a'].'</td>   
        <td>'.$data['b'].'</td>  
        <td>'.$data['c'].'</td> 
        <td>'.$data['keterangan'].'</td>      
        <td>   
    </td>    
        </tr>    
        ';    
        $id++;    
         }    //jika query menghasilkan nilai 0 
    }
        else{     
        echo '    
        <tr>      
        <td colspan="6">Data Tidak ada.</td>    
        </tr>     
        ';     
        }     ?>    <tbody> 
  </table>   
  </div>   

</body>
</html>


