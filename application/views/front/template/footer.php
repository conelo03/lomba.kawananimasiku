    <footer class="footer">
      <div class="container-fluid" style="">
        <div class="row">
          <div class="col-md-3 text-center p-4">
          </div>
          <div class="col-md-6 text-center" >
            <a href="https://instagram.com/btikp_provkalsel?igshid=YmMyMTA2M2Y=" target="_blank"><img src="<?= base_url('assets/image/') ?>PROV.svg" width="50px" /></a>
            <a href="https://instagram.com/intalu_co?igshid=YmMyMTA2M2Y=" target="_blank"><img src="<?= base_url('assets/image/') ?>intalu.png" width="38px"  class="mb-2 ml-2 mr-2" /></a> 
            <a href="https://instagram.com/creativiteam.id?igshid=YmMyMTA2M2Y=" target="_blank"><img src="<?= base_url('assets/image/') ?>creativeteam.png" width="35px"  class="mb-2 ml-2 mr-2" /></a>
            <a href="https://m.facebook.com/ariemursandi.ariemursandi.7" target="_blank"><img src="<?= base_url('assets/image/') ?>FB.svg" width="50px" /></a>
            <a href="https://www.instagram.com/ariemursandi/" target="_blank"><img src="<?= base_url('assets/image/') ?>IG.svg" width="50px" /></a>
            <a href="https://youtube.com/channel/UC9Tju7PUq_GIdhFcxusfooA" target="_blank"><img src="<?= base_url('assets/image/') ?>YT.svg" width="50px" /></a>
            <a href="https://belajar.id" target="_blank"><img src="<?= base_url('assets/image/') ?>KEMENDIKBUD.svg" width="50px" /></a>

            <h5 class="text-white">Visitors : <?= tampil() ?></h5>
            <div class="footer-message text-white">
              <p style="font-size: 8pt;">Copyright@ 2022 by kawananimasiku.id</p>
            </div>
          </div>
          <div class="col-md-3 text-center p-4">
          </div>
        </div>
        
      </div>
    </footer>

    <div class="modal fade " id="login" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="POST" action="<?= base_url('login-guru'); ?>">
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

    <div class="modal fade " id="logout" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Logout</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Anda yakin ingin keluar?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
            <a href="<?= base_url('logout') ?>" class="btn btn-danger">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url().'assets/js/demo.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/vendor/izitoast/js/iziToast.min.js'?>"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
    <script type="text/javascript" src="<?php echo base_url().'assets/vendor/chart.js/Chart.min.js'?>"></script>
    <script type="text/javascript">
      $(document).ready( function () {
        $('#datatables-lomba').DataTable({
          "ordering": false,
        });
      });

    </script>
    <?php if($this->session->flashdata('msg')=='login-success'):?>
      <script type="text/javascript">
        iziToast.success({
            title: 'Sukses!',
            message: 'Anda Berhasil Login!',
            position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
        });
      </script>
    <?php elseif($this->session->flashdata('msg')=='error'):?>
      <script type="text/javascript">
        iziToast.error({
            title: 'Gagal!',
            message: 'Data gagal disimpan!',
            position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
        });
      </script>
    <?php elseif($this->session->flashdata('msg')=='wrong-password'):?>
      <script type="text/javascript">
        iziToast.error({
            title: 'Gagal!',
            message: 'Email atau Passwprd salah!',
            position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
        });
      </script>
    <?php elseif($this->session->flashdata('msg')=='email-not-registered'):?>
      <script type="text/javascript">
        iziToast.error({
            title: 'Gagal!',
            message: 'Email tidak terdaftar!',
            position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
        });
      </script>
    <?php elseif($this->session->flashdata('msg')=='logout-success'):?>
      <script type="text/javascript">
        iziToast.success({
            title: 'Sukses!',
            message: 'Anda Berhasil Logout!',
            position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
        });
      </script>
    <?php elseif($this->session->flashdata('msg')=='upload-success'):?>
      <script type="text/javascript">
        iziToast.success({
            title: 'Sukses!',
            message: 'Data berhasil disimpan!',
            position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
        });
      </script>
    <?php elseif($this->session->flashdata('msg')=='upload-error'):?>
      <script type="text/javascript">
        iziToast.error({
            title: 'Gagal!',
            message: 'Data gagal disimpan!',
            position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
        });
      </script>
    <?php elseif($this->session->flashdata('msg')=='kuota-penuh'):?>
      <script type="text/javascript">
        iziToast.error({
            title: 'Gagal!',
            message: 'Kuota Pelatihan Sudah Penuh!',
            position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
        });
      </script>
    <?php elseif($this->session->flashdata('msg')=='alredy-join'):?>
      <script type="text/javascript">
        iziToast.error({
            title: 'Gagal!',
            message: 'Anda Sudah mengikuti lomba ini!',
            position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
        });
      </script>
    <?php elseif($this->session->flashdata('msg')=='not-match'):?>
      <script type="text/javascript">
        iziToast.error({
            title: 'Gagal!',
            message: 'Jenjang lomba ini tidak untuk Anda!',
            position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
        });
      </script>
    <?php elseif($this->session->flashdata('msg')=='register-success'):?>
      <script type="text/javascript">
        iziToast.success({
            title: 'Sukses!',
            message: 'Anda berhasil mendaftar lomba ini!',
            position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
        });
      </script>
    <?php elseif($this->session->flashdata('msg')=='verifikasi'):?>
      <script type="text/javascript">
        iziToast.success({
            title: 'Sukses!',
            message: 'Data berhasil diverifikasi!',
            position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
        });
      </script>
    <?php endif; ?>
    <script>
      $(document).ready( function () {
        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        <?php

          $jml_guru_kota = [];
          $nama_kota = [];
          foreach ($guru_kota as $key) {
            array_push($jml_guru_kota, $key['jml_guru']);
            array_push($nama_kota, $key['nama_kota']);
          }
          $jml_guru_kota_json = json_encode($jml_guru_kota);
          $nama_kota_json = json_encode($nama_kota);

          $jml_guru_jenjang = [];
          $nama_jenjang = [];
          foreach ($guru_jenjang as $key) {
            array_push($jml_guru_jenjang, $key['jml_guru']);
            array_push($nama_jenjang, $key['jenjang_sekolah']);
          }
          $jml_guru_jenjang_json = json_encode($jml_guru_jenjang);
          $nama_jenjang_json = json_encode($nama_jenjang);
        ?>
        var pieChartCanvas = document.getElementById("pieChart");
        var donutData        = {
          labels: <?= $nama_kota_json ?>,
          datasets: [
            {
              data: <?= $jml_guru_kota_json ?>,
              backgroundColor : ['#fa0202', '#fa9f02', '#eefa02', '#23fa02', '#02faee', '#024cfa', '#fa02f2', '#630101', '#755401', '#017509', '#016d75', '#012475', '#730175'],
            }
          ]
        }
        var pieData        = donutData;
        var pieOptions     = {
          maintainAspectRatio : false,
          legend: {
            display: false
          },
          responsive : false,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var pieChart = new Chart(pieChartCanvas, {
          type: 'pie',
          data: pieData,
          options: pieOptions      
        });

        var pieChartCanvas2 = document.getElementById("pieChart2");
        var donutData        = {
          labels: <?= $nama_jenjang_json ?>,
          datasets: [
            {
              data: <?= $jml_guru_jenjang_json ?>,
              backgroundColor : ['#fa0202', '#fa9f02', '#eefa02', '#23fa02', '#02faee', '#024cfa', '#fa02f2', '#b6b8b6'],
            }
          ]
        }
        var pieData        = donutData;
        var pieOptions     = {
          maintainAspectRatio : false,
          legend: {
            display: false
          },
          responsive : false,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var pieChart = new Chart(pieChartCanvas2, {
          type: 'pie',
          data: pieData,
          options: pieOptions      
        })
      });
    </script>
    <script>
      $(document).ready(function(){
        
        // var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        //     maxZoom: 18,
        //     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        //   }),
        //   latlng = L.latLng(-3.317734951113155, 114.59198027853185);

        // var map = L.map('map', {center: latlng, zoom: 13, layers: [tiles]});

        // var markers = L.markerClusterGroup();
        // var markerList = [];
        var map = new L.Map('map', {zoom: 8, center: new L.latLng(-3.4822191711597648, 115.79965663212306)});	//set center from first location

        map.addLayer(new L.TileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'));	//base layer

        var markersLayer = new L.markerClusterGroup();	//layer contain searched elements
        
        map.addLayer(markersLayer);

        var controlSearch = new L.Control.Search({
          position:'topleft',		
          layer: markersLayer,
          initial: false,
          zoom: 20,
          marker: false
        });

        map.addControl( controlSearch );

        var markers = new L.markerClusterGroup();
        var markerList = [];
        <?php 
          foreach ($sekolah as $key) { ?>
            //var title = "<b><?= $key['nama_sekolah'] ?></b><br><?= $key['alamat_sekolah'] ?>";
            var lat = <?= $key['latitude'] ?>;
            var lang = <?= $key['longitude'] ?>;
            // var marker = L.marker(L.latLng(lat, lang), { title: title });
            // marker.bindPopup(title);
            // markers.addLayer(marker);
            // markerList.push(marker);

            var title = "<?= $key['nama_sekolah'] ?>";	
            var address = "<?= $key['alamat_sekolah'] ?>";	
            marker = new L.Marker(new L.latLng(lat, lang), {title: title} );//se property searched
            marker.bindPopup('<b>' + title + '</b><br>' + address);
            markersLayer.addLayer(marker);
            markerList.push(marker);
        <?php } ?>
        
        map.addLayer(markers);
        
        document.getElementById('doit').onclick = function () {
          var m = markerList[Math.floor(Math.random() * markerList.length)];
          markers.zoomToShowLayer(m, function () {
            m.openPopup();
          });
        };
      });
    </script>
    
  </body>
</html>