<tr class="row-proses">
    <td class="nama_barang">
        <?= $this->input->post('nama_barang') ?>
        <input type="hidden" name="nama_barang_hidden[]" value="<?= $this->input->post('nama_barang') ?>">
    </td>
    <td class="kode_barang">
        <?= $this->input->post('kode_barang') ?>
        <input type="hidden" name="kode_barang_hidden[]" value="<?= $this->input->post('kode_barang') ?>">
    </td>
    <td class="jumlah_barang">
        <?= $this->input->post('jumlah_barang') ?>
        <input type="hidden" name="jumlah_barang_hidden[]" value="<?= $this->input->post('jumlah_barang') ?>">
    </td>
    <td class="nama_satuan">
        <?= $this->input->post('nama_satuan') ?>
        <input type="hidden" name="nama_satuan_hidden[]" value="<?= $this->input->post('nama_satuan') ?>">
    </td>
    <td class="harga_beli">
        Rp. <?= $this->input->post('harga_beli') ?>
        <input type="hidden" name="harga_beli_hidden[]" value="<?= $this->input->post('harga_beli') ?>">
    </td>
    <td class="total">
        Rp. <?= $this->input->post('total') ?>
        <input type="hidden" name="" value="<?= $this->input->post('total') ?>">
    </td>
    <td class="aksi">
        <button type="button" class="btn btn-danger btn-sm" id="tombol-hapus"
            data-nama-barang="<?= $this->input->post('nama_barang') ?>"><i class="fa fa-trash"></i></button>
    </td>
</tr>