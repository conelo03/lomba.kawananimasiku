<?php $this->load->view('front/template/header');?>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?= base_url('assets/image/banner_event_1.jpeg') ?>" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?= base_url('assets/image/banner_event_2.jpeg') ?>" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?= base_url('assets/image/banner_event_3.jpeg') ?>" alt="Third slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?= base_url('assets/image/banner_event_4.jpeg') ?>" alt="Fourth slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?= base_url('assets/image/banner_event_5.jpeg') ?>" alt="Fifth slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="container-fluid mb-8">
  <div class="row mt-4 mb-4">
    <!-- <div class="col-12 col-xl-12 col-md-12 mb-4 text-center">
      <img src="<?= base_url('assets/image/LOGO DAERAH.webp') ?>" class="img" width="100px" alt="...">
      <h5>Balai Teknologi Informasi dan Komunikasi Pendidikan</h5>
      <h3 class="text-center">Lomba</h3>
    </div> -->

    <?php if (!empty($lomba)) { ?>
      <?php foreach ($lomba as $key) { 
        $jml_peserta = $this->db->get_where('tb_detail_lomba', ['id_lomba' => $key['id_lomba']])->num_rows();
        ?>
        <div class="col-md-3 d-flex align-items-stretch">
          <div class="card mb-3 p-2 shadow">
            <a href="<?= base_url('detail-lomba/'.$key['id_lomba']) ?>">
              <div class="bg-transparent" style="
                background: url('https://kawananimasiku.id/assets/upload/poster/<?= $key['poster'] ?>');
                position: relative;
                background-repeat: no-repeat;
                background-size: cover;
                width: 100%!important;
                height: 210px;">
                <div class="text-right">
                  <?php if ($key['status'] == 1) { ?>
                    <span class="badge badge-success mr-1">Open</span>
                  <?php } else { ?>
                    <span class="badge badge-danger mr-1">Closed</span>
                  <?php } ?>
                  
                </div>
                
                <!-- <img src="<?= 'https://kawananimasiku.id/assets/upload/poster/'.$key['poster'] ?>" class="card-img-top" alt="..."> -->
              </div>
            </a>
            <div class="mb-2">
              <b><p class="card-text mt-1 text-justify" style="font-size: 12pt;"><?= $key['nama_lomba'] ?></p></b>
            </div>
            <div class="row">
              <div class="col-1 col-md-1"><i class="fa fa-user text-primary"></i></div>
              <div class="col-11 col-md-11">Untuk Jenjang <?= implode(' / ', explode(',', $key['jenjang_sekolah'])) ?></div>
              <div class="col-12 col-md-12">&nbsp;</div>
              <div class="col-1 col-md-1"><i class="fa fa-calendar text-primary"></i></div>
              <div class="col-11 col-md-11">Batas Tanggal Pengumpulan :</div>
              <div class="col-1 col-md-1"></div>
              <div class="col-11 col-md-11"> 
                <?= date('d F Y', strtotime($key['tanggal_akhir_pendaftaran'])) ?>
              </div> 
              <div class="col-12 col-md-12">&nbsp;</div>
              <div class="col-1 col-md-1"><i class="fa fa-calendar text-primary"></i></div>
              <div class="col-11 col-md-11">Tanggal Pelaksanaan :</div>
              <div class="col-1 col-md-1"></div>
              <div class="col-11 col-md-11"> 
                <?= date('d F Y', strtotime($key['tanggal_lomba'])) ?> <?= $key['tanggal_akhir_lomba'] == null ? '' : ' - '.date('d F Y', strtotime($key['tanggal_akhir_lomba'])) ?>
              </div> 
              <div class="col-12 col-md-12">&nbsp;</div>
              <div class="col-1 col-md-1"><i class="fa fa-users text-primary"></i></div>
              <div class="col-11 col-md-11"><?= $jml_peserta ?> Peserta Terdaftar</div>
              
            </div>
            
              <a href="<?= base_url('detail-lomba/'.$key['id_lomba']) ?>" class="btn btn-warning mt-auto align-self-end">Read More</a>
            
          </div>
        </div>
      <?php } ?>
    <?php } else echo '<div class="text-center">Lomba tidak ditemukan.</div>'; ?>
  </div>

  <div class="row">
    <div class="col">
      <?php echo $pagination; ?>
    </div>
  </div>
  
</div>
<?php $this->load->view('front/template/footer');?> 