<!-- Begin Page Content -->

<div class="container-fluid mb-5 pb-5">
    <div class="row profile">
        <div class="col-lg-4">
            <div class="card" style="border: 1px solid #183f9b;">
                <div class="card-body">
                    <form>
                        <div class="form-group text-center text-hitam">
                            Data pribadi
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama lengkap</label>
                            <input type="text" class="form-control" name="nama" id="nama" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="nama">Email</label>
                            <input type="text" class="form-control" name="nama" id="nama" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="nama">Telephone</label>
                            <input type="text" class="form-control" name="nama" id="nama" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="nama">Asal Sekolah</label>
                            <input type="text" class="form-control" name="nama" id="nama" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="inputState">Gender</label>
                            <select id="inputState" class="form-control">
                                <option selected>Choose...</option>
                                <option>Pria</option>
                                <option>Wanita</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputState">Photo</label>
                            <table width="100%">
                                <tr>
                                    <td width="30%">
                                        <img class="img-fluid rounded float-" src="<?= base_url('asset/user/img/profile.png'); ?>">
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                                <label class="custom-file-label" for="inputGroupFile01">Upload
                                                    Photo</label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <hr>
                        <div class="form-group text-right">
                            <button class="btn btn-dark-blue">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card mt-3 mt-sm-0" style="border: 1px solid #183f9b;">
                <div class="card-body">
                    <form>
                        <div class="form-group text-center text-hitam">
                            Ganti Password
                        </div>
                        <div class="form-group">
                            <label for="nama">Password lama</label>
                            <input type="text" class="form-control" name="nama" id="nama" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="nama">Password baru</label>
                            <input type="text" class="form-control" name="nama" id="nama" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="nama">Verifikasi Password</label>
                            <input type="text" class="form-control" name="nama" id="nama" aria-describedby="helpId" placeholder="">
                        </div>
                        <hr>
                        <div class="form-group text-right">
                            <button class="btn btn-dark-blue">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- /.container-fluid -->