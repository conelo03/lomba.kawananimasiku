<?php $this->load->view('front/template/header');?>
<div class="container mb-4">
  <h2 class="text-center title-event mt-4"><?= $lomba['nama_lomba'] ?></h2>
  <div class="row mt-4">
    <div class="col-md-12 p-4 text-center">
      <img src="<?= 'https://kawananimasiku.id/assets/upload/poster/'.$lomba['poster'] ?>" class="card-img-top" style="max-width: 700px" alt="...">
    </div>
    <div class="col-md-12 p-4">
      <div class="row">
        <div class="col-12 col-md-12"><i class="fa fa-user text-primary"></i> Untuk Jenjang <?= implode(' / ', explode(',', $lomba['jenjang_sekolah'])) ?></div>
        <div class="col-4 col-md-3"><i class="fa fa-calendar text-primary"></i> Batas Tanggal Pengumpulan</div>
        <div class="col-8 col-md-9">: 
          <?= date('d F Y', strtotime($lomba['tanggal_akhir_pendaftaran'])) ?>
        </div> 
        <div class="col-4 col-md-3"><i class="fa fa-calendar text-primary"></i> Tanggal Pelaksanaan</div>
        <div class="col-8 col-md-9">: 
          <?= date('d F Y', strtotime($lomba['tanggal_lomba'])) ?> <?= $lomba['tanggal_akhir_lomba'] == null ? '' : ' - '.date('d F Y', strtotime($lomba['tanggal_akhir_lomba'])) ?>
        </div> 
        <div class="col-4 col-md-3"><i class="fa fa-users text-primary"> </i> Jumlah Peserta</div>
        <div class="col-8 col-md-9">: <?= $jml_peserta ?> Peserta Terdaftar</div> 
        <div class="col-4 col-md-3"><i class="fa fa-exclamation text-primary"> </i> Status</div>
        <div class="col-8 col-md-9">: <?= $lomba['status'] == 1 ? 'Open' : 'Closed' ?></div> 
      </div>
      <p class="text-justify"><?= str_replace('</p><br />', '</p>', $lomba['deskripsi_lomba']) ?></p>
    </div>
    <div class="col-md-12 p-4 text-center">
      <h5>Daftar Peserta <?= $lomba['nama_lomba'] ?></h5>
    </div>
    <div class="col-md-12">
      <div class="table-responsive">
        <table class="table table-striped" id="datatables-lomba">
          <thead>
            <tr>
              <th class="text-center" style="width: 50px;">#</th>
              <th>Nama</th>
              <th style="width: 30%;">Unit Kerja</th>
              <th style="width: 20%;">Kab / Kota</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1; 
            foreach($peserta as $u):?>
            <tr>
              <td class="text-center"><?= $no++;?></td>
              <td><?= $u['nama_guru'];?></td>
              <td><?= $u['nama_sekolah'];?></td>
              <td><?= $u['kota'];?></td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-md-12 p-4 text-center">
      <?php if($lomba['status'] == 1): ?>
        <?= $this->session->flashdata('pesan'); ?>
        <?php if($this->session->userdata('login')): 
          $this->db->select('*');
          $this->db->from('tb_detail_lomba');
          $this->db->join('tb_guru', 'tb_guru.id_guru=tb_detail_lomba.id_guru');
          $this->db->where('tb_detail_lomba.id_lomba', $lomba['id_lomba']);
          $this->db->where('tb_detail_lomba.id_guru', $this->session->userdata('id_guru'));
          $cek		= $this->db->get();
        ?>
          <?php if($cek->num_rows() > 0): ?>
            <?php if(date('Y-m-d H:i:s') <= $lomba['tanggal_akhir_pendaftaran']): ?>
              <a data-toggle="modal" data-target="#upload-hasil-lomba<?= $lomba['id_lomba'] ?>" class="btn btn-lg btn-info">Upload URL Hasil Lomba</a>
            <?php else: ?>
              Batas waktu pengumpulan sudah selesai, terima kasih atas partisipasinya.
            <?php endif; ?>
            
          <?php else: ?>
            <?php if(date('Y-m-d H:i:s') <= $lomba['tanggal_akhir_pendaftaran']): ?>
              <a data-toggle="modal" data-target="#daftar-lomba<?= $lomba['id_lomba'] ?>" class="btn btn-lg btn-warning">Daftar Sekarang</a>
            <?php else: ?>
              Pendaftaran sudah ditutup, sampai jumpa di lomba berikutnya.
            <?php endif; ?>
          <?php endif; ?>
          
        <?php else: ?>
          <?php if(date('Y-m-d H:i:s') <= $lomba['tanggal_akhir_pendaftaran']): ?>
            <a data-toggle="modal" data-target="#login<?= $lomba['id_lomba'] ?>" class="btn btn-lg btn-warning">Daftar Sekarang</a>
          <?php else: ?>
            Pendaftaran sudah ditutup, sampai jumpa di lomba berikutnya.
          <?php endif; ?>
          
        <?php endif; ?>
      <?php endif; ?>
    </div>
    
  </div>
  
</div>

<div class="modal fade " id="login<?= $lomba['id_lomba'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Anda harus Login terlebih dahulu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="<?= base_url('login-guru/'.$lomba['id_lomba']); ?>">
      <div class="modal-body">
        <div class="form-group">
          <label for="username">Email</label>
          <input id="username" type="email" class="form-control" name="email" required autofocus>
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <div class="float-right">
            <a href="<?= 'https://belajar.kawananimasiku.id/forgot-password'; ?>" target="_blank" class="text-small">
              Lupa Password?
            </a>
          </div>
          <input id="password" type="password" class="form-control" name="password" required>
        </div>

        <div class="mt-2 text-center">
          <b>Belum punya akun? <a href="<?= 'https://belajar.kawananimasiku.id/register-guru' ?>" target="_blank">Buat Akun disini</a></b>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
      </form>
    </div>
  </div>
</div>


<?php if($this->session->userdata('login')): ?>
<div class="modal fade " id="upload-hasil-lomba<?= $lomba['id_lomba'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Form Hasil Lomba</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="<?= base_url('upload-hasil-lomba/'.$lomba['id_lomba']); ?>">
      <?php
        $get = $cek->row_array();
      ?>
      <div class="modal-body">
        <div class="form-group">
          <label for="file">Url Download File Animasi Pembelajaran</label>
          <input id="file" type="text" class="form-control" name="file" value="<?= $get['url_drive'] ?>" required >
          <span class="text-danger small">URL Google Drive/sejenisnya Konten Lomba berupa rar / zip</span><br>
        </div>

        <div class="form-group">
          <label for="video">Url Download Video Animasi Pembelajaran</label>
          <input id="video" type="text" class="form-control" name="video" value="<?= $get['url_youtube'] ?>" required >
          <span class="text-danger small">Url Youtube Hasil Video Animasi Pembelajaran masing masing</span>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Kirim</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade " id="daftar-lomba<?= $lomba['id_lomba'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Daftar Lomba</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Anda yakin ingin mengikuti Lomba ini?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
        <a href="<?= base_url('daftar-lomba/'.$lomba['id_lomba']) ?>" class="btn btn-success">Daftar</a>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
<?php $this->load->view('front/template/footer');?>