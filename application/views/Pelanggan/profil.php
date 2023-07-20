<!-- Title Page -->
<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(<?= base_url('asset/pato-master/') ?>images/bg-title-page-02.jpg);">
    <h2 class="tit6 t-center">
        Profil
    </h2>
</section>


<!-- Reservation -->
<section class="section-reservation bg1-pattern p-t-100 p-b-113">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 p-b-30">
                <div class="t-center">
                    <span class="tit2 t-center">
                        SISI JALAN KOPi
                    </span>

                    <h3 class="tit3 t-center m-b-35 m-t-2">
                        Profil
                    </h3>
                    <?php if ($this->session->userdata('success')) {
                        echo '<div class="alert alert-success" role="alert">';
                        echo $this->session->userdata('success');
                        echo '</div>';
                    } ?>
                </div>
                <form action="<?= base_url('pelanggan/cprofil/daftar_member/' . $pelanggan->id_pelanggan) ?>" method="POST" class="wrap-form-reservation size22 m-l-r-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Name -->
                            <span class="txt9">
                                Nama Pelanggan
                            </span>

                            <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <input value="<?= $pelanggan->nama_pelanggan ?>" class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="name" placeholder="Name" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- Phone -->
                            <span class="txt9">
                                Jenis Kelamin
                            </span>

                            <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <input value="<?php if ($pelanggan->jenis_kelamin == 'P') {
                                                    echo 'Perempuan';
                                                } else {
                                                    echo 'Laki-Laki';
                                                } ?>" class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="phone" placeholder="Phone" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"> <span class="txt9">
                                Alamat
                            </span>

                            <div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <input value="<?= $pelanggan->alamat ?>" class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="email" placeholder="Email" readonly>
                            </div>
                        </div>
                        <div class="col-md-6"> <span class="txt9">
                                No Telepon
                            </span>

                            <div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <input value="<?= $pelanggan->no_hp ?>" class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="email" placeholder="Email" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="wrap-btn-booking flex-c-m m-t-6">
                        <!-- Button3 -->
                        <button type="submit" class="btn3 flex-c-m size13 txt11 trans-0-4">
                            Daftar Member
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-lg-4">
                <div class="size23 w-full-md p-t-40 p-r-30 p-r-0-md">
                    <h4 class="txt5 m-b-18">
                        Member
                    </h4>
                    <p>Silahkan anda mendaftar sebagai member sisi jalan kopi! Nikmati berbagai diskon yang diberikan!</p>

                    <br>
                    <?php
                    if ($pelanggan->member == '0') {
                        echo '<p>Saat ini status anda belum sebagai member!</p>';
                    } else {
                        echo '<p>Saat ini status anda sebagai member! Time: <br><strong>' . $pelanggan->create_member . '</strong></p>';
                    }
                    ?>

                </div>
            </div>
        </div>

    </div>
</section>