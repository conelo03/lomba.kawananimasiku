<?php $this->load->view('front/template/header');?>
<div class="container mb-4">
  <h2 class="text-center title-event mt-4">Silahkan Login untuk melanjutkan Pendaftaran</h2>
  <div class="row mt-4">
    <div class="col-md-12 p-4">
      <form>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
      </form>
    </div>
    
  </div>
  
</div>

<?php $this->load->view('front/template/footer');?>