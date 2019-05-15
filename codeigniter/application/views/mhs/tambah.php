<h2>
    Tambah Mahasiswa
</h2>
<hr>
<br>
<?= form_open('Mahasiswa/simpan'); ?>
<table>
    <tr>
        <td>NRP</td>
        <td>:</td>
        <td><?= form_input('nrp'); ?></td>
    </tr>
    <tr>
        <td>Nama</td>
        <td>:</td>
        <td><?= form_input('nama') ?></td>
    </tr>
    <tr>
        <td colspan="2"></td>
        <td>
            <?= form_submit('submit', 'Simpan'); ?> |
            <a href="<?= base_url('index.php/Mahasiswa/show')?>" style="text-decoration: none">
                <button type="button"> Batal</button>
            </a>
        </td>
    </tr>
</table>
<?= form_close(); ?>
