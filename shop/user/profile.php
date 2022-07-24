<div class="col-lg-9 col-md-8 col-12">
    <div class="card bg-light mb-3 mt-2" style="max-width: 50rem;">
        <div class="card-header" style="background-color: #F7941D; color:#fff;">MY PROFILE</div>
        <div class="card-body bg-white">
            <?php
            //Membuat varialbel username dari session login username 
            $username = $_SESSION['username'];

            //Mencari data profile dari tabel user
            // $profile = $this->db->query("SELECT * FROM user WHERE username = '$username' ")->row();
            $profile = querysatudata("SELECT * FROM user WHERE username = '$username'  ");

            ?>

            <div class="row">
                <div class="col-lg-3">
                    Nama Lengkap
                </div>
                <div class="col-lg-9">
                    <?= $profile['nama_lengkap'] ?>
                </div>
                <div class="col-lg-3">
                    Email
                </div>
                <div class="col-lg-9">
                    <?= $profile['email'] ?>
                </div>
                <div class="col-lg-3">
                    Number Phone
                </div>
                <div class="col-lg-9">
                    <?= $profile['nomer_hp'] ?>
                </div>
                <div class="col-lg-3">
                    Password
                </div>
                <div class="col-lg-9">
                    <a href="<?= base_url('shop/user/index.php?halaman=profile_password') ?>"><span class="badge badge-info">Ganti Password</span></a>
                </div>
                <div class="col-lg-3">

                </div>
                <div class="col-lg-9">
                    <a href="<?= base_url('shop/user/index.php?halaman=profile_edit&id_user=') ?><?= $profile['id_user'] ?>"><span class="badge badge-warning">Edit Profile</span></a>
                </div>
            </div>
        </div>
    </div>




    <div class="card bg-light mb-3 mt-3" style="max-width: 50rem;">
        <div class="card-header" style=" background-color: #F7941D; color:#fff;">ALAMAT SAYA</div>
        <div class="card-body bg-white">
            <div class="row">
                <div class="col-lg-3">
                    Provinsi
                </div>
                <div class="col-lg-9">
                    <?= $profile['nama_lengkap'] ?>
                </div>
                <div class="col-lg-3">
                    Kota
                </div>
                <div class="col-lg-9">
                    <?= $profile['email'] ?>
                </div>

                <div class="col-lg-3">
                    Kecamatan
                </div>
                <div class="col-lg-9">
                    <?= $profile['nomer_hp'] ?>
                </div>
                <div class="col-lg-3">
                    Kode Post
                </div>

                <div class="col-lg-9">

                </div>

                <div class="col-lg-3">
                    Detail Alamat
                </div>
                <div class="col-lg-9">
                    <textarea name="" id="" class="form-control" cols="30" rows="5"></textarea>
                </div>
                <div class="col-lg-3">

                </div>
                <div class="col-lg-9">
                    <a href="<?= base_url('raja_vapor/user/edit_alamat') ?>"><span class="badge badge-warning">Edit Alamat</span></a>
                </div>


            </div>

            <!-- <h5 class="card-title">Light card title</h5>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
        </div>
    </div>



</div>
</div>
</div>