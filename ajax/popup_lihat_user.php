<?php
  if(isset($_POST["viewusr"]))
  {
    require '../koneksi/function.php';
    $output = '';
    $queryUser = $conn->query("SELECT * FROM tbl_user WHERE id_user = '".$_POST['viewusr']."'");
      foreach($queryUser as $row)
      {
        $output .= '
          <div class="form-row">
            <div class="form-group form-group-default mb-4">
              <label><b>Nama</b></label>
              <input class="form-control" required placeholder="Nama user" value="'.$row['nama_user'].'" readonly>
            </div>
            <div class="form-group form-group-default mb-4">
              <label><b>Username</b></label>
              <input class="form-control" required placeholder="Username user" value="'.$row['username_user'].'" readonly>
            </div>
            <div class="form-group form-group-default mb-4">
              <label><b>Email</b></label>
              <input class="form-control" placeholder="Email user" value="'.$row['email_user'].'" readonly>
            </div>
            <div class="form-group form-group-default mb-4">
              <label><b>Telepon</b></label>
              <input class="form-control" placeholder="Telepon user" value="'.$row['notelp_user'].'" readonly>
            </div>
            <div class="form-group form-group-default mb-4">
              <label><b>Tgl lahir</b></label>
              <input class="form-control bg-white" placeholder="Tanggal lahir user" value="'.$row['dob_user'].'" readonly>
            </div>
            <div class="form-group form-group-default mb-4">
              <label><b>Gender</b></label>
              <select class="form-control bg-light border" readonly>
                <option>'.$row['jk_user'].'</option>
              </select>
            </div>
            <div class="form-group form-group-default mb-4">
              <label><b>Alamat</b></label>
              <textarea class="form-control" placeholder="Alamat user" readonly>'.$row['alamat_user'].'</textarea>
            </div>
            <div class="form-group form-group-default mb-4">
              <label><b>Hak Akses</b></label>
              <select class="form-control bg-light border" readonly>
                <option>'.$row['hak_akses_user'].'</option>
              </select>
            </div>
            <div class="form-group form-group-default mb-4">
              <label><b>Status</b></label>
              <select class="form-control bg-light border" readonly>
                <option>'.$row['status_user'].'</option>
              </select>
            </div>
          </div>
        ';  
      } 
    echo $output;  
  }
  $conn -> close();
?>