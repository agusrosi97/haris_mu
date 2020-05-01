<?php
  if(isset($_POST["viewcus"]))
  {
    require '../koneksi/function.php';
    $output = '';
    $queryCustomer = $conn->query("SELECT * FROM tbl_customer WHERE id_customer = '".$_POST['viewcus']."'");
      foreach($queryCustomer as $row)
      {
        $output .= '
          <div class="form-row">
            <div class="form-group form-group-default mb-4">
              <label><b>Nama</b></label>
              <input class="form-control" required placeholder="Nama customer" value="'.$row['nama_customer'].'" readonly>
            </div>
            <div class="form-group form-group-default mb-4">
              <label><b>Username</b></label>
              <input class="form-control" required placeholder="Username customer" value="'.$row['username_customer'].'" readonly>
            </div>
            <div class="form-group form-group-default mb-4">
              <label><b>Email</b></label>
              <input class="form-control" placeholder="Email customer" value="'.$row['email_customer'].'" readonly>
            </div>
            <div class="form-group form-group-default mb-4">
              <label><b>Telepon</b></label>
              <input class="form-control" placeholder="Telepon customer" value="'.$row['notelp_customer'].'" readonly>
            </div>
            <div class="form-group form-group-default mb-4">
              <label><b>Tgl lahir</b></label>
              <input class="form-control bg-white" placeholder="Tanggal lahir customer" value="'.$row['dob_customer'].'" readonly>
            </div>
            <div class="form-group form-group-default mb-4">
              <label ><b>Gender</b></label>
              <select class="form-control bg-light border" disabled>
                <option>'.$row['jk_customer'].'</option>
              </select>
            </div>
            <div class="form-group form-group-default mb-4">
              <label><b>Alamat</b></label>
              <textarea class="form-control" placeholder="Alamat customer" readonly>'.$row['alamat_customer'].'</textarea>
            </div>
          </div>
        ';  
      } 
    echo $output;  
  }
  $conn -> close();
?>