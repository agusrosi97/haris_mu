<div class="container container-profile">
  <div class="page-inner">
    <h4 class="page-title">Akun Saya</h4>
    <div class="row">
      <div class="col">
        <div class="card card-with-nav">
          <div class="card-header">
            <div class="row row-nav-line">
              <ul class="nav nav-tabs nav-line nav-color-secondary w-100 pl-3" role="tablist">
                <li class="nav-item"> <a id="link_pill_profile" class="nav-link active show" data-toggle="pill" href="#pengaturan_profile" role="tab" aria-controls="pengaturan_profile" aria-selected="true">Profil</a> </li>
                <li class="nav-item"> <a id="link_pill_password" class="nav-link" data-toggle="pill" href="#pengaturan_password" role="tab" aria-controls="pengaturan_password" aria-selected="false">Kata Sandi</a> </li>
              </ul>
            </div>
          </div>
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane fade show active" id="pengaturan_profile" role="tabpanel" aria-labelledby="link_pill_profile">
                <form id="form_profile" method="POST" enctype="multipart/form-data">
                  <div class="row mt-3">
                    <div class="col-md-3">
                      <div class="col d-flex justify-content-center mb-4 text-center">
                        <div class="input-file input-file-image">
                          <img class="img-upload-preview" width="150" src="<?= $row['foto_user'] == "" ? "https://via.placeholder.com/150" : "assets/upload_image/" . $row['foto_user']; ?>" alt="preview">
                          <input type="file" class="form-control form-control-file" id="uploadImg2" name="foto_user" accept="image/*">
                          <label for="uploadImg2" class="label-input-file btn btn-black btn-round">
                            <span class="btn-label">
                              <i class="fa fa-file-image"></i>
                            </span>
                            <?= $row['foto_user'] == "" ? "Upload Foto" : "Ganti Foto"; ?>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-9">
                      <div class="row">
                        <div class="col-md-7 mb-3">
                          <div class="form-group form-group-default">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control prf" name="nama_user" placeholder="Nama Anda" value="<?= $row['nama_user'] ?>">
                          </div>
                        </div>
                        <div class="col-md-5 mb-2">
                          <div class="form-group form-group-default">
                            <label>Username</label>
                            <input type="text" class="form-control prf" name="username_user" placeholder="Username Anda" value="<?= $row['username_user'] ?>" id="input_username">
                          </div>
                          <div class="pl-3 d-none font-weight-bold text-danger" style="font-size: 79% !important; margin-top: -.8rem!important" id="user-ada"></div>
                        </div>
                        <div class="col-md-7 mb-2">
                          <div class="form-group form-group-default">
                            <label>Email</label>
                            <input type="email" class="form-control prf" name="email_user" placeholder="Email Anda" value="<?= $row['email_user'] ?>" readonly>
                          </div>
                        </div>
                        <div class="col-md-5 mb-2">
                          <div class="form-group form-group-default">
                            <label>Tanggal Lahir</label>
                            <?php $tgl = date_format(new Datetime($row['dob_user']), "d-m-Y") ?>
                            <input type="text" class="form-control prf" id="datepicker" name="dob_user" value="<?= $tgl ?>" placeholder="Tanggal lahir" readonly>
                          </div>
                        </div>
                        <div class="col-md-5 mb-2">
                          <div class="form-group form-group-default">
                            <label>Nomor Telepon</label>
                            <input type="text" class="form-control prf" value="<?= $row['notelp_user'] ?>" name="notelp_user" placeholder="Nomor telepon Anda">
                          </div>
                        </div>
                        <div class="col-md-4 mb-2">
                          <div class="form-group form-group-default mb-4">
                            <label>Jenis Kelamin</label>
                            <select class="sel1 form-control" id="gender" data-container="body" title="Jenis Kelamin" name="jk_user">
                              <option value="">Pilih</option>
                              <option value="L" <?= $row['jk_user'] == 'L' ? "selected" : ""; ?>>Laki-laki</option>
                              <option value="P" <?= $row['jk_user'] == 'P' ? "selected" : ""; ?>>Perempuan</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12 mb-2">
                          <div class="form-group form-group-default">
                            <label>Alamat</label>
                            <textarea class="form-control prf" name="alamat_user" placeholder="Alamat Anda"><?= $row['alamat_user'] ?></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12 d-flex align-items-center px-0">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="agree" name="agree" required>
                          <label class="custom-control-label check-label" for="agree">Centang jika Anda yakin!</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="text-right mt-3 mb-3">
                    <button id="btn-save" type="submit" class="btn btn-success" name="submit">Simpan</button>
                    <button type="button" class="btn btn-danger show_index">Batal</button>
                  </div>
                </form>
              </div>
              <div class="tab-pane fade" id="pengaturan_password" role="tabpanel" aria-labelledby="link_pill_password">
                <form id="form_password" method="POST">
                  <div class="row mt-3">
                    <div class="col-md-6 ml-auto mr-auto">
                      <div class="login-form settingup_profile">
                        <div class="form-group">
                          <label>Password Lama :</label>
                          <div class="position-relative">
                            <input name="old_password" type="password" class="form-control">
                            <div class="show-password">
                              <i class="icon-eye"></i>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Password Baru :</label>
                          <input name="new_password" type="password" class="form-control" id="new_password">
                        </div>
                        <div class="form-group">
                          <label>Ulangi Password Baru:</label>
                          <input name="confirm_password" type="password" class="form-control">
                        </div>
                        <div class="custom-control custom-checkbox ml-2 mt-3">
                          <input type="checkbox" class="custom-control-input" id="agree2" name="agree2" required>
                          <label class="custom-control-label check-label" for="agree2">Centang tombol ini jika Anda yakin.</label>
                        </div>
                      </div>
                      <div class="text-center mt-4 mb-3">
                        <button id="btn-save2" type="submit" class="btn btn-success" name="submit_password">Simpan</button>
                        <button type="button" class="btn btn-danger show_index">Batal</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>