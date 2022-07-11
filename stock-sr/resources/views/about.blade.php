
@extends('layouts.main')

@section('container')
  <div class="container my-content mt-5 pt-5">
    <h1 class="text-center mb-3"><b>Tentang Kami</b></h1>
    <hr>
    <div class="row justify-content-center">
      <div class="col-md-5 text-center">
        <img src="img/{{ $image }}" class="rounded-circle" alt="{{ $name }}" style="width: 250px; margin-top:-30px;">
      </div>
      <div class="col-md-5">
        <h2 ><strong>{{ $name }}</strong></h2>
        <p >Jl. Surtikanti, Bulu Lor, Kec. Semarang Utara, Kota Semarang, Jawa Tengah 50179</p>
        <a href="https://tokopedia.link/surtikantishop01" target="_blank"><img src="/img/tokopedia.png" alt="tokopedia" style="width:80px;"></a>
        <a href="https://tokopedia.link/surtikantishop01" target="_blank"><img src="/img/logo.png" alt="shopee" style="width:50px;"></a>
      </div>
    </div>
    <div class="row justify-content-center mt-3">
      <div class="col-lg-8 shadow-lg py-3">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3330.196747858479!2d110.40303999662613!3d-6.974637706540479!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70f4b561293dbf%3A0xd9d049ecc8bad198!2sJl.%20Surtikanti%2C%20Bulu%20Lor%2C%20Kec.%20Semarang%20Utara%2C%20Kota%20Semarang%2C%20Jawa%20Tengah%2050179!5e0!3m2!1sid!2sid!4v1655823222396!5m2!1sid!2sid" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </div>
@endsection