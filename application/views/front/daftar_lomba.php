<?php $this->load->view('front/template/header');?>
<div class="container mb-4">
  <h2 class="text-center title-event mt-4">Daftar Lomba</h2>
  <div class="row mt-4">
    <div class="col-md-12">
      <div class="table-responsive">
        <table class="table table-striped" id="datatables-lomba">
          <thead>
            <tr>
              <th class="text-center" style="width: 50px;">#</th>
              <th>Nama Lomba</th>
              <th>Batas Tanggal Pendaftaran</th>
              <th>Tanggal Pengumpulan</th>
              <th>Jenjang</th>
              <th>Status</th>
              <th class="text-center" style="width: 100px;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1; 
            foreach($lomba as $u):
              $cek = $this->db->get_where('tb_detail_lomba', ['id_lomba' => $u['id_lomba'], 'id_guru' => 15]);
            ?>
            <tr>
              <td class="text-center"><?= $no++;?></td>
              <td><?= $u['nama_lomba'];?></td>
              <td>
                <?= date('H:i d-m-Y', strtotime($u['tanggal_akhir_pendaftaran']));?>
              </td>
              <td>
                <?= date('H:i d-m-Y', strtotime($u['tanggal_lomba']));?> s/d <?= $u['tanggal_akhir_lomba'] == null ? 'selesai' : date('H:i d-m-Y', strtotime($u['tanggal_akhir_lomba']));?>
              </td>
              <td><?= implode(" / ", explode(",", $u['jenjang_sekolah']));?></td>
              <td><?= $u['status'] == 1 ? 'Open' : 'Closed';?></td>

              <td class="text-center">
              <?php if($cek->num_rows() > 0 && (date('2022-09-02 H:i:s') <= $u['tanggal_akhir_lomba'] && date('2022-09-02 H:i:s') >= $u['tanggal_lomba'])): ?>
                <button class="btn btn-success" data-confirm="Anda yakin ingin ingin mendaftar lomba ini?|Data yang sudah dihapus tidak akan kembali." data-confirm-yes="document.location.href='<?= base_url('hapus-lomba/'.$u['id_lomba']); ?>';"><i class="fa fa-edit"></i> Upload</button>
              <?php endif; ?>
              <?php if($cek->num_rows() == 0 && $u['status'] == 1 && date('Y-m-d H:i:s') <= $u['tanggal_akhir_pendaftaran']): ?>
                <button class="btn btn-info" data-confirm="Daftar Lomba?|Anda yakin ingin ingin mendaftar lomba ini?" data-confirm-yes="document.location.href='<?= base_url('hapus-lomba/'.$u['id_lomba']); ?>';"><i class="fa fa-edit"></i> Daftar</button>
              <?php endif; ?>
              </td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
      </div>
    </div>
    
  </div>
  
</div>

<?php $this->load->view('front/template/footer');?>