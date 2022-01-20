@extends('layouts.master')

@section('title', 'Home')

@section('content')
@if (Auth::user()->role != 'admin'){
    <section class="welcome" style="background-color: #f6f8f9; height: 25vh; text-align:center; padding: 15% 0;">
        <div class="welcome-user">
            <h2 class="text-4xl">Welcome, <span>{{ Auth::user()->name }}!</span> </h2>
            <div class="card-body" style="color: black">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                {{ __('You are logged in!') }}
            </div>

            <div class="see-more">
                <a href="{{ route('profile')}}" class="button-content">See More</a>
            </div>
        </div>
    </section>
}
@else
    <section class="welcome" style="background-color: #f6f8f9; height: 25vh; text-align:center; padding: 15% 0;">
        <h2 class="text-4xl">Welcome, <span>{{ Auth::user()->name }}!</span> </h2>
        <div class="see-more">
            <a href="{{ route('manage') }}" class="button-content">Manage User</a>
        </div>
    </section>
@endif

    <section class="intro">
        <div class="intro-about">
            <h4>Tentang Perusahaan Kami</h4>
            <p>Travelku merupakan jasa yang menawarkan layanan pembelian tiket pesawat <i>online</i>, peminjaman mobil  dan  paket wisata. Kami menyediakan jasa baik domestik maupun mancanegara. Dengan adanya website ini, diharapkan para customer mendapat kemudahan dalam perjalanan wisata. </p>
        </div>
        <img src="{{ asset('assets/introduction.png') }}">
    </section>

    <section class="why-choose-us" style="background-color: #f6f8f9;">
        <h1>Why Choose Us</h1>
        <div class="wrap-row">
			<div class="wrap">
				<img src="{{ asset('assets/engine.png') }}" style="width: 12vw; height: 20vh;"><br>
				<h4 style="margin-left: 20%;">Easy to Use</h4><br>
				<p>Cara yang cepat dan mudah.<br>
				   Kami pandu dan bantu anda <br>
				   dalam menggunakan layanan <br>
				   jasa di website kami. Kami <br>
				   juga menyiapkan call center <br>
				   24 jam yang siap membantu. <br>
				</p>
			</div>
			<div class="wrap">
				<img src="{{ asset('assets/tag.png') }}" style="width: 12vw; height: 20vh;"><br>
				<h4 style="margin-left: 15%;">Best Vacation</h4><br>
				<p>Lain dengan  travel agent pada<br>
				   umumnya, kami siap menawarkan <br>
				   harga terjangkau. Klaim kami  <br>
				   apabila menemukan harga yang  <br>
				   lebih murah! <br>
				</p>
			</div>
			<div class="wrap">
				<img src="{{ asset('assets/reward.png') }}" style="width: 12vw; height: 20vh;"><br>
				<h4 style="margin-left: 10%;">Best Travel Agent</h4><br>
				<p>Kami merupakan travel agent <br>
				   terbesar dan terpercaya di  <br>
				   Indonesia. Kami bekerja sama <br>
				   dengan ratusan partner penerbangan <br>
				   dan hotel untuk menghadirkan <br>
				   promo menarik setiap harinya. <br>
				</p>
			</div>
		</div>
	</div>
    </section>
@endsection
