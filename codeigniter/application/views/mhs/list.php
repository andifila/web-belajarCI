<div><?php echo $message; ?></div>
<div>Hai <?php echo $username; ?></div>
<div>
    <a href="<?= base_url('index.php/Mahasiswa/tambah') ?>">Tambah</a> |
    <a href="<?= base_url('index.php/login/logout') ?>">Logout</a>
    
</div>
<br>
<?php
foreach ($records as $row) {
    echo $row->nrp . "<br />";
    echo $row->nama . "<br />";
    echo '<a href="edit/' . $row->nrp . '" style="text-decoration: none"><button type="button">Edit</button> </a> | ';
    echo '<a href="hapus/' . $row->nrp . '" style="text-decoration: none"><button type="button">Hapus</button> </a>';
    echo "<hr>";
}
?>