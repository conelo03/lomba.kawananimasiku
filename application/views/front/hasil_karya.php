<?php $this->load->view('front/template/header');?>
<div class="container-fluid mb-8">
  <div class="row justify-content-center p-2 bg-banner">
      <div class="col-md-8" style="padding: 150px 0;">
          <h1 class="text-center text-white">Hasil Karya Lomba</h1>
          <!-- <form action="<?= base_url('Home/cari_png') ?>" method="POST">
            <div class="input-group mb-3">
                <input type="text" name="keyword" class="form-control" value="<?= $search ?>" placeholder="Search Image" aria-label="Search Image" aria-describedby="button-addon2" id="search-input">
                <div class="input-group-append">
                    <button class="btn btn-warning" type="submit" id="search-button">Search</button>
                </div>
            </div>
          </form> -->
      </div>
  </div>
  <div class="row justify-content-center mt-4 mb-4 p-2">
      <div class="col-md-8">
          <!-- <form action="<?= base_url('Home/cari_materi') ?>" method="POST" class="mt-4">
            <div class="input-group mb-3">
                <input type="text" name="keyword" class="form-control" value="<?= $search ?>" placeholder="Search Content" aria-label="Search Image" aria-describedby="button-addon2" id="search-input">
                <div class="input-group-append">
                    <button class="btn btn-warning" type="submit" id="search-button">Search</button>
                </div>
            </div>
          </form> -->
          <h2><?= $lomba['nama_lomba'] ?></h2>
      </div>
  </div>
  <div class="row">
    <?php if (!empty($png)) { ?>
      <?php foreach ($png as $key) { 
        $url_youtube = $key['url_youtube'];
        ?>
        <div class="col-md-3 d-flex align-items-stretch">
          <div class="card mb-3 p-2 shadow">
            <a href="<?= base_url('Home/detail/'.$key['id_detail_lomba']) ?>">
              <?php if ($lomba['kategori_lomba'] == 'Lomba Video Animasi'): ?>
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item"src="<?= $key['url_youtube'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                  </iframe>
                </div>
              <?php elseif ($lomba['kategori_lomba'] == 'Lomba MPI'):?>
                <img class="card-img-top" src="https://kawananimasiku.id/assets/upload/lomba_mpi/<?= $key['url_youtube'] ?>" height="200px" alt="Card image cap">
              <?php endif; ?>
            </a>
            <div>
            </div>
            <div>
              <i>
                <p class="mb-1">Posted by 
                <?php if ($key['id_guru'] == 0) { ?>
                  <?= $key['tanggal_upload'];?>
                <?php } else { 
                  $guru = $this->db->get_where('tb_guru', ['id_guru' => $key['id_guru']])->row_array();
                  echo $guru['nama_guru']." (".$guru['mata_pelajaran']." Kelas ".$guru['kelas']." - ".$guru['nama_sekolah'].")";
                } ?>
                </p>
              </i>
            </div>
            <?php if ($lomba['kategori_lomba'] == 'Lomba Video Animasi'): ?>
              <a href="<?= $url_youtube ?>" target="_blank" class="btn btn-warning mt-auto align-self-end">Watch</a>
            <?php endif; ?>
          </div>
        </div>
      <?php } ?>
    <?php } else echo '<div class="text-center">Materi tidak ditemukan.</div>'; ?>
  </div>

  <div class="row">
    <div class="col">
      <!--Tampilkan pagination-->
      <?php echo $pagination; ?>
    </div>
  </div>
  
  <!-- <div class="container">
    <div class="row justify-content-center mt-4 mb-4">
      <div class="col-12 col-xl-12 col-md-12">
        <h3 class="text-center">Sumber Belajar Lainnya</h3>
      </div>
      <div class="row mt-4">
        <div class="col-2 col-md-2">
          <a href="https://radioedukasi.kemdikbud.go.id/" target="_blank"><img src="<?= base_url('assets/image/sumber-belajar/') ?>20160324103327.png" style="max-width: 100%;" class="img" /></a>
        </div>
        <div class="col-2 col-md-2">
          <a href="https://m-edukasi.kemdikbud.go.id/medukasi/" target="_blank"><img src="<?= base_url('assets/image/sumber-belajar/') ?>logo-m-edukasi.png" style="max-width: 100%;" class="img" /></a>
        </div>
        <div class="col-2 col-md-2">
          <a href="https://youtube.com/c/KokBisa" target="_blank"><img src="<?= base_url('assets/image/sumber-belajar/') ?>kok-bisa.jpeg" style="max-width: 80%;" class="img" /></a>
        </div>
        <div class="col-2 col-md-2">
          <a href="http://tve.kemdikbud.go.id/" target="_blank"><img src="<?= base_url('assets/image/sumber-belajar/') ?>logo-tve-2-324x160.png" style="max-width: 100%;" class="img" /></a>
        </div>
        <div class="col-2 col-md-2">
          <a href="http://emodul.kemdikbud.go.id/" target="_blank"><img src="<?= base_url('assets/image/sumber-belajar/') ?>Web Banner - 2-image6.png" style="max-width: 100%;" class="img" /></a>
        </div>
        <div class="col-2 col-md-2">
          <a href="http://gerbangkurikulum.sma.kemdikbud.go.id/e-modul/" target="_blank"><img src="<?= base_url('assets/image/sumber-belajar/') ?>logo-E-Modul.jpeg" style="max-width: 100%;" class="img" /></a>
        </div>
        <div class="col-2 col-md-2">
          <a href="http://gerbangkurikulum.sma.kemdikbud.go.id/e-modul/" target="_blank"><img src="<?= base_url('assets/image/sumber-belajar/') ?>gerbang-kurikulum-logo-1.png" style="max-width: 100%;" class="img" /></a>
        </div>
        <div class="col-3 col-md-3">
          <a href="https://buku.kemdikbud.go.id/" target="_blank"><img src="<?= base_url('assets/image/sumber-belajar/') ?>pusat buku nasional.jpeg" style="max-width: 100%;" class="img" /></a>
        </div>
        <div class="col-2 col-md-2">
          <a href="#" target="_blank"><img src="<?= base_url('assets/image/sumber-belajar/') ?>merdeka-belajar.png" style="max-width: 100%;" class="img" /></a>
        </div>
        <div class="col-3 col-md-3">
          <a href="https://belajar.kemdikbud.go.id/" target="_blank"><img src="<?= base_url('assets/image/sumber-belajar/') ?>logo-rumah-belajar.png" style="max-width: 100%;" class="img" /></a>
        </div>
        <div class="col-3 col-md-2">
          <a href="https://guru.kemdikbud.go.id/" target="_blank"><img src="<?= base_url('assets/image/sumber-belajar/') ?>b1f27306303df7d7a59c869c0e35310ac676ca9c.png" style="max-width: 100%;" class="img" /></a>
        </div>
        <div class="col-3 col-md-2">
          <a href="https://btikp.kalselprov.go.id/" target="_blank"><img src="<?= base_url('assets/image/sumber-belajar/') ?>btikp-logo.png" style="max-width: 100%;" class="img" /></a>
        </div>
        <div class="col-2 col-md-2">
          <a href="#" target="_blank"><img src="<?= base_url('assets/image/sumber-belajar/') ?>logo RADIO.png" style="max-width: 100%;" class="img" /></a>
        </div>
        <div class="col-2 col-md-2">
          <a href="#" target="_blank"><img src="<?= base_url('assets/image/sumber-belajar/') ?>kawan belajar logo 3.png" style="max-width: 100%;" class="img" /></a>
        </div>
        <div class="col-2 col-md-2">
          <a href="#" target="_blank"><img src="<?= base_url('assets/image/sumber-belajar/') ?>wahana logos.png" style="max-width: 100%;" class="img" /></a>
        </div>
      </div>
      
    </div>
  </div>

  <div class="container">
    <div class="row justify-content-center mt-4 mb-4">
      <div class="col-12 col-xl-12 col-md-12">
        <h3 class="text-center">Cari Sekolah</h3>
      </div>
      <div class="col-12 col-xl-12 col-md-12">
        <div class="row mt-4">
          <div class="col-12 col-md-12">
            <div id="map"></div>
          </div>
        </div>
      </div>
      
      
    </div>
  </div> -->
  
</div>
<?php $this->load->view('front/template/footer');?> 