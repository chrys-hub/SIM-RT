<?= $this->extend('layout/dashboard-layout-warga');?>
<?= $this->section('content');?>
<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>Sticky Footer Template · Bootstrap v5.0</title>
    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <style>
        
    </style>
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/5.0/examples/sticky-footer/sticky-footer.css" rel="stylesheet">
    <script src="/js/jquery.min.js"></script>
    <script src="/js/jquery.table2excel.js"></script>
    
</head>

<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
<button type="button"  class="btn btn-success mb-2" id="export">Export excel</button>
<table class="table table-hover table-bordered" id="myTable">
                <thead>
                    <tr class="table-primary">
                        <th>Nominal</th>
                        <th>Kategori</th>
                        <th>Orang Yang Berkaitan</th>
                        <th>Aksi Keuangan</th>
                        <th>Tanggal</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($keuangan as $row) {
                    ?>
                        <tr>
                            <td><?= $row['nominal'] ?></td>
                            <td><?= $row['nama_kategori'] ?></td>
                            <td><?= $row['nama_warga'] ?></td>
                            <td><?= $row['aksi'] ?></td>
                            <td><?= $row['tanggal'] ?></td>
                            <td><?= $row['deskripsi'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                    <tr>
                    <td colspan="2"><b>TOTAL UANG YANG BELUM DI BAYAR:<?= "Rp " . number_format($belumbayar['totalbelumbayar'],2,',','.'); ?></b></td>
                    <td style="display: none" class="kosong1"></td>
                    <td colspan="2"><b>TOTAL PEMASUKAN:<?= "Rp " . number_format($pemasukan['totalmasuk'],2,',','.'); ?></b></td>
                    <td style="display: none" class="kosong2"></td>
                    <td colspan="2"><b>TOTAL PENGELUARAN:<?= "Rp " . number_format($pengeluaran['totalkeluar'],2,',','.'); ?></b></td>
                    <td style="display: none" class="kosong3"></td>
                    <td></td>
                    </tr>
                </tbody>
            </table>


    

<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script src="/js/jquery.table2excel.js"></script>
<script type="text/javascript">

$(document).ready(function(){
    $('#myTable').DataTable({
        paging: false,
        info: false,
    });

$('#export').on('click',function(){
    $("#myTable").table2excel({
            filename: "datakeuangan.xls",
            exclude: ".btn-edit",
            exclude: ".btn-delete",
        });
});

});


</script>
</body>

</html>

<?= $this->endSection() ?>