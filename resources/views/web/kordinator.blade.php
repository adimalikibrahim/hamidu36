@extends('layouts.web.appWeb')

@section('title', 'Kordinator')
@section('webKor', 'active')

@section('konten')
    <section class="py-5 price-wrap">
        <div class="container">
            <div class="row g-4 position-relative mb-4">
                <figure class="position-absolute top-0 start-0 d-none d-sm-block">
                    <svg width="22px" height="22px" viewBox="0 0 22 22">
                        <polygon class="fill-purple"
                            points="22,8.3 13.7,8.3 13.7,0 8.3,0 8.3,8.3 0,8.3 0,13.7 8.3,13.7 8.3,22 13.7,22 13.7,13.7 22,13.7 ">
                        </polygon>
                    </svg>
                </figure>

                <div class="col-lg-10 mx-auto text-center position-relative">
                    <figure class="position-absolute top-30 end-10 translate-middle-y d-none d-md-block">
                        <svg width="27px" height="27px">
                            <path class="fill-orange"
                                d="M13.122,5.946 L17.679,-0.001 L17.404,7.528 L24.661,5.946 L19.683,11.533 L26.244,15.056 L18.891,16.089 L21.686,23.068 L15.400,19.062 L13.122,26.232 L10.843,19.062 L4.557,23.068 L7.352,16.089 L-0.000,15.056 L6.561,11.533 L1.582,5.946 L8.839,7.528 L8.565,-0.001 L13.122,5.946 Z">
                            </path>
                        </svg>
                    </figure>
                    <h1>Daftar Kordinator</h1>
                    <p class="mb-0 pb-0">Himpunan Alumni Miftahul Huda II Bayasari</p>
                </div>
            </div>
            <div class="row g-4">

                @foreach ($kor as $kord)
                    <div class="col-md-6 col-xl-4">
                        <div class="card border rounded-3 p-2 p-sm-4">
                            <div class="card-header p-0">
                                <div class="d-flex justify-content-between align-items-center p-3 bg-light rounded-2">
                                    <div>
                                        <h4 class="mb-0">{{ $kord->kordinator }}</h4>
                                    </div>
                                    <div>
                                        <h4 class="text-success mb-0 plan-price">
                                            {{ $alumni->where('id_kordinator', $kord->id_kordinator)->count() }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="card-footer text-center d-grid pb-0 m-0 p-0">
                                <a href="/hamidu/anggota-kordinator/{{ $kord->id_kordinator }}" class="btn btn-dark mb-0">Lihat
                                    Anggota</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
