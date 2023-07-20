<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Perbaharui Data User </h1>

        <div class="row">
            <div class="col-12 col-xl-5">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">User</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('admin/cuser/update/' . $user->id_user) ?>" method="POST">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Nama User</label>
                                        <input type="text" value="<?= $user->nama_user ?>" name="nama" class="form-control" placeholder="Masukkan Nama User">
                                        <?= form_error('nama', '<small class="form-text text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Alamat</label>
                                        <input type="text" value="<?= $user->alamat ?>" name="alamat" class="form-control" placeholder="Masukkan Alamat User">
                                        <?= form_error('alamat', '<small class="form-text text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">No Telepon</label>
                                        <input type="number" value="<?= $user->no_hp ?>" name="no_hp" class="form-control" placeholder="Masukkan No Telepon">
                                        <?= form_error('no_hp', '<small class="form-text text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Level User</label>
                                        <select class="form-control" name="level">
                                            <option value="">---Pilih Level User---</option>
                                            <option value="1" <?php if ($user->level_user == '1') {
                                                                    echo 'selected';
                                                                } ?>>Admin</option>
                                            <option value="2" <?php if ($user->level_user == '2') {
                                                                    echo 'selected';
                                                                } ?>>Owner</option>
                                        </select>
                                        <?= form_error('level', '<small class="form-text text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Username</label>
                                        <input type="text" value="<?= $user->username ?>" name="username" class="form-control" placeholder="Masukkan Username">
                                        <?= form_error('username', '<small class="form-text text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Password</label>
                                        <input type="text" name="password" value="<?= $user->password ?>" class="form-control" placeholder="Masukkan Password">
                                        <?= form_error('password', '<small class="form-text text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>