<?php
  $b = $this->db->get_where('tb_biodata', ['id_biodata' => '1'])->row_array();
  
  $this->db->like('nama_lomba', 'LOMBA', 'after');
  $this->db->where('tanggal_akhir_lomba <', date('Y-m-d'));
  $lomba = $this->db->get('tb_lomba')->result_array();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?= base_url() ?>assets/image/favicon.png" type="image/gif" sizes="16x16">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css" integrity="sha512-3M00D/rn8n+2ZVXBO9Hib0GKNpkm8MSUU/e2VNthDyBYxKWG+BftNYYcuEjXlyrSO637tidzMBXfE7sQm0INUg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/vendor/izitoast/css/iziToast.min.css'?>"/>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" integrity="sha512-07I2e+7D8p6he1SIM+1twR5TIrhUQn9+I6yjqD53JQjFiMf8EtC93ty0/5vJTZGF8aAocvHYNEDJajGdNx1IsQ==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet-src.js" integrity="sha512-WXoSHqw/t26DszhdMhOXOkI7qCiv5QWXhH9R7CgvgZMHz1ImlkVQ3uNsiQKu5wwbbxtPzFXd1hK4tzno2VqhpA==" crossorigin=""></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/vendor/leaflet/') ?>screen.css" />

    <link rel="stylesheet" href="<?= base_url('assets/vendor/leaflet/') ?>MarkerCluster.css" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/leaflet/') ?>MarkerCluster.Default.css" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/leaflet-search/') ?>src/leaflet-search.css" />
    <script src="<?= base_url('assets/vendor/leaflet/') ?>leaflet.markercluster-src.js"></script>
    <script src="<?= base_url('assets/vendor/leaflet-search/') ?>src/leaflet-search.js"></script>
    

    <title>Lomba || Kawan Animasiku</title>
    <style>
      @media only screen and (max-width: 600px) {
        /* For tablets: */
        h2.title-event {
          font-size: 1rem;
        }
      }
      .bg-banner{
        background: url('<?= str_replace("lomba.", "", base_url('assets/image/'.$b['bg_banner_hasil_lomba'])) ?>');
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        position: relative;
        padding: 100px 0;
      }
      .bg-transparent{
        position: relative;
        background-repeat: no-repeat;
        background-size: cover;
        width: 100%!important;
        height: 185px;
      }
      .footer {
        position: relative;
        bottom: 0;
        width: 100%;
        height: auto;
        line-height: 60px;
        background-color: #343a40!important;
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
      }
      .footer-message {
        padding-top: 10px;
        padding-bottom: 10px;
        color: #000;
        line-height: 25px;
        text-align: center;
      }
      h5 .description:hover{
        text-decoration: none;
        color: black;
      }
      .wafixed {
        position: fixed;
        right: 100px;
        bottom: 20px;
        z-index: 999;
      }
    </style>
  </head>
  <body>
    <a class="wafixed" href="https://wa.me/6285286666080" target="_blank"><span class="fa-stack fa-lg">
      <img src="<?= base_url('assets/image/') ?>wa.png" width="150px" />
    </span></a>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="<?= base_url('Home') ?>"><img src="<?= base_url('assets/image/LOGO.png') ?>" height="30" ></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?= $title == 'Home' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('') ?>">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
              Hasil Karya Lomba
            </a>
            <?php if ($lomba) { ?>
            <div class="dropdown-menu">
              <?php foreach ($lomba as $key) { 
                $nama_lomba = str_replace(" VIDEO", "", $key['nama_lomba']); 
                $nama_lomba = str_replace(" PEMBELAJARAN", "", $nama_lomba); 
                $nama_lomba = str_replace(" JENJANG", "", $nama_lomba); 
              ?>
                <a class="dropdown-item" href="<?= base_url('hasil-karya-lomba/'.$key['id_lomba']) ?>"><?= $nama_lomba ?></a>
              <?php } ?>
            </div>
            <?php } ?>
          </li>
        </ul>
        <ul class="navbar-nav my-2 my-lg-0">
          <?php if($this->session->userdata('login')): ?>
            <li class="nav-item active">
              <a href="#" class="nav-link">Selamat datang, <?= $this->session->userdata('nama_guru') ?> </a>
            </li>
            <li class="nav-item <?= $title == 'Logout' ? 'active' : '' ?>">
              <a  data-toggle="modal" data-target="#logout" class="btn btn-outline-warning">Logout</a>
            </li>
          <?php else: ?>
            <li class="nav-item">
              <button data-toggle="modal" data-target="#login" class="btn btn-outline-warning">Login</button>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </nav>