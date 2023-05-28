<?php

include('koneksi.php');




?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Admin Lokal Brand</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="admin.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
  
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
	  		<h1><a href="home.php" class="logo">Lokal Brand</a></h1>
        <ul class="list-unstyled components mb-5">
        <li>
            <a href="brand.php"><span class="fa fa-home mr-3"></span> Brand</a>
          </li>
          <li>
              <a href="produk.php"><span class="fa fa-user mr-3"></span>Produk</a>
          </li>
          
          <li class="active">
              <a href="kategori.php"><span class="fa fa-plus mr-3"></span>Kategori</a>
          </li>
        </ul>

    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
      <table id="example" class="display" style="width:100%">
    <thead>
    <a href="tambahkategori.php"><button type="button" class="btn btn-primary">Tambah Data</button></a>
    <br><br>
    <?php
  include 'koneksi.php';
  $sql = "SELECT * FROM kategori";
  $result = mysqli_query($conn, $sql);
  ?>
    <tr>
        <th>Id</th>
        <th>Nama Kategori</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    <?php
        if (mysqli_num_rows($result) > 0) { 
            while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row["id_kategori"]; ?></td>
                    <td><?php echo $row["nama_kategori"]; ?></td>
                    <td>
                        <div class="action" style="display: flex;">
                        <a href="editkategori.php?nama_kategori=<?php echo $row['nama_kategori'] ?>"><button type="button" class="btn btn-primary">Edit</button></a>
                            || <a href="deletekategori.php?nama_kategori=<?php echo $row['nama_kategori'] ?>"><button type="button" class="btn btn-primary">Delete</button></a>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        <?php }?>
</tbody>
    <script>

        $(document).ready(function () {
            $('#example').DataTable({
                order: [[3, 'desc']],
            });
        });
        </script>

    </div>

      </div>
		

   
    <script src="js/js/popper.js"></script>
    <script src="js/js/bootstrap.min.js"></script>
    <script src="js/js/main.js"></script>
    <script>
function myFunction() {
   var element = document.body;
   element.classList.toggle("dark-mode");
}
</script>
  </body>
</html>