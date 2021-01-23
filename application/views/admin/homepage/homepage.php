<script>
    const menu = ['Header', 'Tentang', 'Alasan', 'Produk', 'Testimoni', 'Footer']


    function menuHome(index) {
        tampil = menu[index];
        $('#home').text(tampil);
        for (i = 0; i < menu.length; i++) {
            if (i == index) {
                $('#' + menu[index]).show();
            }
            if (i != index) {
                $('#' + menu[index]).hide();
            }
        }
    }
</script>
<div class="container-fluid homepage" style="height: 1000px;">
    <div class="row">
        <div class="col-4 ">
            <div class="dropdown">
                <a class="btn btn-info dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span id="home">Header</span>
                </a>

                <div class="dropdown-menu mt-2 shadow" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#" id="home-1" onclick="menuHome(0)">Header</a>
                    <a class="dropdown-item" href="#" id="home-2" onclick="menuHome(1)">Tentang</a>
                    <a class="dropdown-item" href="#" id="home-3" onclick="menuHome(2)">Alasan</a>
                    <a class="dropdown-item" href="#" id="home-4" onclick="menuHome(3)">Produk</a>
                    <a class="dropdown-item" href="#" id="home-5" onclick="menuHome(4)">Testimoni</a>
                    <a class="dropdown-item" href="#" id="home-6" onclick="menuHome(5)">footer</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div id="Header">Header</div>
            <div id="Tentang">Tentang</div>
            <div id="Alasan">Alasan</div>
            <div id="Produk">Produk</div>
            <div id="Testimoni">Testimoni</div>
            <div id="Footer">Footer</div>
        </div>
    </div>
</div>

<script>
    for (i = 0; i < menu.length; i++) {
        $('#' + menu[i]).hide();
        // console.log('#' + menu[i]);
    }
</script>