@extends('layouts.app')

@section('content')
    <!--HEADER START-->
    <header class="masthead">
        <div class="container h-100">
          <div class="row h-100 align-items-center">
            <div class="col-12 text-center">
              <img src="/img/logo-login-2.png" height="100%" alt="Thenub Photography Studio" loading="lazy">
              <h1 class="font-weight-normal" style="color: white;">Your Photography Studio</h1>
              <p class="lead" id="motto" style="color: white;"></p>
              <a href="/login"><button type="button" class="btn btn-light rounded-pill"><i class="fas fa-user-plus"></i> Join Now</button></a>
            </div>
          </div>
        </div>
      </header>
      <!--Header-->
<div class="container">
      <!-- INTRO START -->
      <section class="py-5">
        <h1 class="text-center">Your Benefits</h1>
        </hr>
        </br>
        <div class="container">
          <div class="row">
            <div class="col-4">
              <center><img src="/img/icon/photos-dark-fix.png"></center>
              <h3>Unlimited Storage</h3>
              <p class="text-justify">Ruang penyimpanan tanpa batas dan tidak ada kompresi file.
               buat portofolio karya terbaikmu disini.</p>
            </div>
            <div class="col-4">
              <center><img src="/img/icon/share-dark-fix.png"></center>
              <h3>Share Your Creation</h3>
              <p class="text-justify">Bagikan karyamu ke berbagai media lain seperti
               Facebook, Instagram, atau situs pribadi anda.</p>
            </div>
            <div class="col-4">
              <center><img src="/img/icon/album-dark-fix.png"></center>
              <h3>Manage Your Album</h3>
              <p class="text-justify">Buat kolase dan susun karya digitalmu dengan fitur album, 
               kelompokkan karya sesuai tema atau kategori sesukamu.</p>
            </div>
          </div>
          </br>
          <div class="row">
            <div class="col-2"></div>
            <div class="col-4">
              <center><img src="/img/icon/ui-dark-fix.png"></center>
              <h3>Build to be Responsive</h3>
              <p class="text-justify">Situs  ini kami rancang agar simple, ringan & responsive
               sehingga mudah diakses oleh semua orang dari berbagai device.</p>
            </div>
            <div class="col-4">
              <center><img src="/img/icon/notif-dark-fix.png"></center>
              <h3>Build Your Audience</h3>
              <p class="text-justify">Pengikutmu akan selalu mendapat pemberitahuan
               jika anda mengunggah karya baru.</p>
            </div>
            <div class="col-2"></div>
          </div>
        </div>
      </section>
      <!-- INTRO END -->
</div>
@endsection
