$(document).ready(function () {
    //Buku
    $('#addbuku').click(function () {
        var url = $(this).data('url');
        $('.modal-title').text('Add Buku');
        $('.modal-footer button[type="submit"]').html('Add');
        $('.body-buku form').attr('action',url + '/book');
        $('.body-buku form').attr('method','POST');

        $('input[name="judul_buku"]').val('');
        $('input[name="isbn"]').val('');
        $('input[name="pengarang"]').val('');
        $('input[name="penerbit"]').val('');
        $('input[name="jumlah_buku"]').val('');
        $('select[name="jenis_buku"] option').removeAttr('selected');
    });
    $('#editbuku*').click(function () {
        var url = $(this).data('url');
        var id = $(this).data('id');
        $('.modal-title').text('Edit Buku');
        $('.modal-footer button[type="submit"]').html('Edit');
        $('.body-buku form').attr('action',url + '/book/update/' + id);
        $('.body-buku form').attr('method','POST');

        let _url = url + '/book/edit/';
        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: _url + id,
            data:{
                _token:_token,
            },
            success: function (hasil) {
                $('input[name="judul_buku"]').val(hasil.book.judul_buku);
                $('input[name="isbn"]').val(hasil.book.isbn);
                $('input[name="pengarang"]').val(hasil.book.pengarang);
                $('input[name="letak_buku"]').val(hasil.book.letak_buku);
                $('input[name="asal_buku"]').val(hasil.book.asal_buku);
                $('input[name="penerbit"]').val(hasil.book.penerbit);
                $('input[name="jumlah_buku"]').val(hasil.book.jumlah_buku);
                $('input[name="tahun_penerbit"]').val(hasil.book.tahun_penerbit);
                $('select[name="jenis_buku"] option[value="' + hasil.book.jenis_buku + '"]').attr('selected', true);
            }
        })
    });
    //Katagori
    $('#addkatagori').click(function () {
        var url = $(this).data('url');
        $('.modal-title').text('Add Katagori');
        $('.modal-footer button[type="submit"]').html('Add');
        $('.body-katagori form').attr('action',url + '/katagori');
        $('.body-katagori form').attr('method','POST');

        $('input[name="katagori"]').val('');
    });
    $('#editkatagori*').click(function () {
        var url = $(this).data('url');
        var id = $(this).data('id');
        $('.modal-title').text('Edit Katagori');
        $('.modal-footer button[type="submit"]').html('Edit');
        $('.body-katagori form').attr('action',url + '/katagori/update/' + id);
        $('.body-katagori form').attr('method','POST');

        let _url = url + '/katagori/edit/';
        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: _url + id,
            data:{
                _token:_token,
            },
            success: function (hasil) {
                $('input[name="katagori"]').val(hasil.katagori.nama_katagori);
            }
        })
    });
    //Operator
    $('#addoperator').click(function () {
        $('.modal-title').text('Add Operator');
        $('.modal-footer button[type="submit"]').html('Add');
        $('.body-operator form').attr('action','/perpustakaan/management/operator');
        $('.body-operator form').attr('method','POST');

        $('input[name="nama"]').val('');
        $('input[name="nik"]').val('');
        $('input[name="tanggal_lahir"]').val('');
        $('input[name="alamat"]').val('');
        $('input[name="username"]').val('');
        $('input[name="password"]').val('');
        $('input[name="jenis_kelamin"]').val('');
    });
    $('#editoperator*').click(function () {
        var id = $(this).data('id');
        $('.modal-title').text('Edit Operator');
        $('.modal-footer button[type="submit"]').html('Edit');
        $('.body-operator form').attr('action', '/perpustakaan/management/operator/update/' + id);
        $('.body-operator form').attr('method','POST');

        let _url = '/perpustakaan/management/operator/edit/';
        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: _url + id,
            data:{
                _token:_token,
            },
            success: function (hasil) {
                $('input[name="name"]').val(hasil.operator.name);
                $('input[name="nik"]').val(hasil.operator.nik);
                $('input[name="tanggal_lahir"]').val(hasil.operator.tanggal_lahir);
                $('input[name="alamat"]').val(hasil.operator.alamat);
                $('input[name="username"]').val(hasil.operator.username);
                $('input[name="password"]').attr('disabled',true);
                if (hasil.operator.jenis_kelamin == 'laki-laki') {
                    $('select[name="jenis_kelamin"] option[value="' + 1 + '"]').attr('selected',true);
                } else {
                    $('select[name="jenis_kelamin"] option[value="' + 2 + '"]').attr('selected',true);
                }
            }
        })
    });
    //User
    $('#edituser*').click(function () {
        var id = $(this).data('id');
        $('.modal-title').text('Show User');

        let _url = '/perpustakaan/management/user/edit/';
        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: _url + id,
            data:{
                _token:_token,
            },
            success: function (hasil) {
                $('input[name="name"]').val(hasil.user.name);
                $('input[name="nik"]').val(hasil.user.nik);
                $('input[name="alamat"]').val(hasil.user.alamat);
                $('input[name="nomerhp"]').val(hasil.user.nomerhp);
                $('input[name="email"]').val(hasil.user.email);
                $('input[name="status"]').val(hasil.user.status);
                $('input[name="username"]').val(hasil.user.username);
                $('input[name="password"]').attr('disabled',true);
                if (hasil.user.jenis_kelamin == 'laki-laki') {
                    $('select[name="jenis_kelamin"] option[value="' + 1 + '"]').attr('selected',true);
                } else {
                    $('select[name="jenis_kelamin"] option[value="' + 2 + '"]').attr('selected',true);
                }
            }
        })
    });
    //Peminjaman
    $('#editpeminjaman*').click(function () {
        var id = $(this).data('id');
        $('.modal-title').text('Show Peminjaman');
        $('.modal-footer button[type="submit"]').html('Submit');
        $('.body-operator form').attr('action', '/perpustakaan/peminjaman/update/' + id);
        $('.body-operator form').attr('method', 'POST');

        let _url = '/perpustakaan/peminjaman/edit/';
        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: _url + id,
            data:{
                _token:_token,
            },
            success: function (hasil) {
                $('input[name="nama"]').val(hasil.peminjaman.nama);
                $('input[name="judul_buku"]').val(hasil.peminjaman.judul_buku);
                $('input[name="kode_buku"]').val(hasil.peminjaman.kode_buku);
                $('input[name="isbn"]').val(hasil.peminjaman.isbn);
                $('input[name="no_panggil"]').val(hasil.peminjaman.no_panggil);
                $('input[name="jenis_peminjaman"]').val(hasil.peminjaman.jenis_peminjaman);
                $('input[name="tanggal_peminjaman"]').val(hasil.peminjaman.tanggal_peminjaman);
                $('input[name="tanggal_pengembalian"]').val(hasil.peminjaman.tanggal_pengembalian);
            }
        })
    });
    //Pilih Buku
    $('#pilihbuku*').click(function () {
        var id = $(this).data('id');
        $('.modal-title').text('Detail Buku');
        $('.modal-footer button[type="submit"]').html('Checkout');
        $('.body-pilih form').attr('action','/checkout');
        $('.body-pilih form').attr('method','POST');

        let _url = '/book/show/';
        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: _url + id,
            data:{
                _token:_token,
            },
            success: function (hasil) {
                $('input[name="judul_buku"]').val(hasil.book.judul_buku);
                $('input[name="isbn"]').val(hasil.book.isbn);
                $('input[name="pengarang"]').val(hasil.book.pengarang);
                $('input[name="penerbit"]').val(hasil.book.penerbit);
                $('input[name="jumlah_buku"]').val(hasil.book.jumlah_buku);
                $('input[name="tahun_penerbit"]').val(hasil.book.tahun_penerbit);
                $('input[name="letak_buku"]').val(hasil.book.letak_buku);
                $('input[name="asal_buku"]').val(hasil.book.asal_buku);
                $('select[name="jenis_buku"] option[value="' + hasil.book.jenis_buku + '"]').attr('selected', true);
            }
        })
    });
    //Show Peminjaman Buku
    $('#showpeminjaman*').click(function () {
        var id = $(this).data('id');
        $('.modal-title').text('Show Peminjaman Buku');

        let _url = '/peminjaman/show/';
        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: _url + id,
            data:{
                _token:_token,
            },
            success: function (hasil) {
               $('input[name="nama"]').val(hasil.peminjaman.nama);
               $('input[name="judul_buku"]').val(hasil.peminjaman.judul_buku);
               $('input[name="kode_buku"]').val(hasil.peminjaman.kode_buku);
               $('input[name="isbn"]').val(hasil.peminjaman.isbn);
               $('input[name="no_panggil"]').val(hasil.peminjaman.no_panggil);
               $('input[name="jenis_peminjaman"]').val(hasil.peminjaman.jenis_peminjaman);
               $('input[name="tanggal_peminjaman"]').val(hasil.peminjaman.tanggal_peminjaman);
               $('input[name="tanggal_pengembalian"]').val(hasil.peminjaman.tanggal_pengembalian);
            }
        })
    });
    //Checkout
    $('#checkout*').click(function () {
        var id = $(this).data('id');
        $('.modal-title').text('Checkout Buku');
        $('.modal-footer button[type="submit"]').html('Checkout');
        $('.body-checkout form').attr('action', '/peminjaman');
        $('.body-checkout form').attr('method', 'POST');

        $('input[name="checkout"]').val(id);
    });
    //Checkout All
    $('#checkoutall').click(function () {
        $('.modal-title').text('Checkout All Buku');
        $('.modal-footer button[type="submit"]').html('Checkout');
        $('.body-checkout form').attr('action', '/peminjaman');
        $('.body-checkout form').attr('method', 'POST');

        $('input[name="checkout"]').val('all');
    });
})
