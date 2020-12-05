<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-body p-1">
                    <div class="table-responsive">
                        <table class="table mb-0 table-hover">
                            <tr class="rounded border" style="background-color: #253468;">
                                <td colspan="2" class="text-light text-center">DATA USER</td>
                            </tr>
                            <tr>
                                <td class="text-biru">Name</td>
                                <td>Agus Priyono</td>
                            </tr>
                            <tr>
                                <td class="text-biru">Email</td>
                                <td>gaa@hdjd.com</td>
                            </tr>
                            <tr>
                                <td class="text-biru">Phone</td>
                                <td>082828828282</td>
                            </tr>
                            <tr>
                                <td class="text-biru">Asal Sekolah</td>
                                <td>jajaj</td>
                            </tr>
                            <tr>
                                <td class="text-biru">UserName</td>
                                <td>aguspriyono</td>
                            </tr>
                            <tr>
                                <td class="text-biru">NISN</td>
                                <td>1222222222</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-body px-0">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-6 text-center text-md-right">
                                <button type="button" class="btn border tambah-produk-manual">Tambah Produk Manual</button>
                            </div>
                            <div class="col-6 text-center text-md-left">
                                <button type="button" class="btn border send-pw-baru">Send Password Baru</button>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <select class="form-control" name="" id="">
                                                <option selected>Nama Produk</option>
                                                <option>A</option>
                                                <option>B</option>
                                            </select>
                                        </div>
                                        <button type="button" class="btn btn-primary">Tambah Produk</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <div class="h3 text-biru">Paket Users</div>
        </div>
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body px-0">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-6 text-center text-md-right">
                                <button type="button" class="btn border paket-users" id="menu-belum">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-collection" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M14.5 13.5h-13A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5zm-13 1A1.5 1.5 0 0 1 0 13V6a1.5 1.5 0 0 1 1.5-1.5h13A1.5 1.5 0 0 1 16 6v7a1.5 1.5 0 0 1-1.5 1.5h-13zM2 3a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11A.5.5 0 0 0 2 3zm2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1z" />
                                    </svg>
                                    <div> Paket Belum Digunakan </div>
                                </button>
                            </div>
                            <div class="col-6 text-center text-md-left">
                                <button type="button" class="btn border" id="menu-sudah">
                                    <svg width=" 1em" height="1em" viewBox="0 0 16 16" class="bi bi-collection" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M14.5 13.5h-13A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5zm-13 1A1.5 1.5 0 0 1 0 13V6a1.5 1.5 0 0 1 1.5-1.5h13A1.5 1.5 0 0 1 16 6v7a1.5 1.5 0 0 1-1.5 1.5h-13zM2 3a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11A.5.5 0 0 0 2 3zm2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1z" />
                                    </svg>
                                    <div> Paket Sudah Digunakan </div>
                                </button>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="table-responsive " id="paket-belum">
                                    <table class="table">
                                        <thead>
                                            <tr class="text-dark">
                                                <th>Nama</th>
                                                <th>Kategori</th>
                                                <th>Jadwal</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                            <tr>
                                                <td colspan="5" class="text-center">No data <b>Paket belum digunakan</b> </td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="table-responsive hide-content" id="paket-sudah">
                                    <table class="table">
                                        <thead>
                                            <tr class="text-dark">
                                                <th>Nama</th>
                                                <th>Kategori</th>
                                                <th>Jadwal</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                            <tr>
                                                <td colspan="5" class="text-center">No data <b>Paket sudah digunakan</b></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {

        $("#menu-belum").click(function() {
            $("#paket-sudah").addClass("hide-content");
            $("#paket-belum").removeClass("hide-content");

            $("#menu-belum").addClass("paket-users");
            $("#menu-sudah").removeClass("paket-users");
        });

        $("#menu-sudah").click(function() {
            $("#paket-belum").addClass("hide-content");
            $("#paket-sudah").removeClass("hide-content");

            $("#menu-sudah").addClass("paket-users");
            $("#menu-belum").removeClass("paket-users");
        });
    });
</script>