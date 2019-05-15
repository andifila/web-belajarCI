<h2>
    Ubah Mahasiswa
</h2>
<hr>
<br>
<?= form_open('Mahasiswa/ubah'); ?>
<table>
    <tr>
        <td>NRP</td>
        <td>:</td>
        <td><?= form_input('nrp', $nrp,'readonly'); ?></td>
    </tr>
    <tr>
        <td>Nama</td>
        <td>:</td>
        <td><?= form_input('nama', $nama) ?></td>
    </tr>
    <tr>
        <td colspan="2"></td>
        <td>
            <?= form_submit('submit', 'Ubah'); ?> |
            <a href="<?= base_url('Mahasiswa/show')?>" style="text-decoration: none">
                <button type="button"> Batal</button>
            </a>
        </td>
    </tr>
</table>
<?= form_close(); ?>
