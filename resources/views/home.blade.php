@extends('layouts.app')
@section('title', 'Home')
@section('home', 'active')

@push('css')
    {{-- {!! Charts::assets() !!} --}}
@endpush
@section('konten')


    <div class="row g-4 mb-4">
        <!-- Counter item -->
        <div class="col-md-3 col-xxl-3">
            <div class="card card-body bg-warning bg-opacity-15 p-4 h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <!-- Digit -->
                    <div>
                        <h2 class="purecounter mb-0 fw-bold" data-purecounter-start="0"
                            data-purecounter-end="{{ $kordinator->count() }}" data-purecounter-delay="200">0</h2>
                        <span class="mb-0 h6 fw-light">Kordinator</span>
                    </div>
                    <!-- Icon -->
                    <div class="icon-lg rounded-circle bg-warning text-white mb-0"><i class="fas fa-hotel fa-fw"></i></div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-xxl-3">
            <div class="card card-body bg-primary bg-opacity-10 p-4 h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <!-- Digit -->
                    <div>
                        <h2 class="purecounter mb-0 fw-bold" data-purecounter-start="0"
                            data-purecounter-end="{{ $alumni->count() }}" data-purecounter-delay="200">0</h2>
                        <span class="mb-0 h6 fw-light">Seluruh Alumni</span>
                    </div>
                    <!-- Icon -->
                    <div class="icon-lg rounded-circle bg-primary text-white mb-0"><i class="fas fa-users fa-fw"></i></div>
                </div>
            </div>
        </div>

        <!-- Counter item -->
        <div class="col-md-3 col-xxl-3">
            <div class="card card-body bg-success bg-opacity-10 p-4 h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <!-- Digit -->
                    <div>
                        <div class="d-flex">
                            <h2 class="purecounter mb-0 fw-bold" data-purecounter-start="0"
                                data-purecounter-end="{{ $alumni->where('jk', 1)->count() }}"
                                data-purecounter-delay="200">0
                            </h2>
                        </div>
                        <span class="mb-0 h6 fw-light">Hamidu</span>
                    </div>
                    <!-- Icon -->
                    <div class="icon-lg rounded-circle bg-success text-white mb-0"><i class="fas fa-user-tie fa-fw"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Counter item -->
        <div class="col-md-3 col-xxl-3">
            <div class="card card-body bg-purple bg-opacity-10 p-4 h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <!-- Digit -->
                    <div>
                        <h2 class="purecounter mb-0 fw-bold" data-purecounter-start="0"
                            data-purecounter-end="{{ $alumni->where('jk', 2)->count() }}" data-purecounter-delay="200">0
                        </h2>
                        <span class="mb-0 h6 fw-light">Sawahud</span>
                    </div>
                    <!-- Icon -->
                    <div class="icon-lg rounded-circle bg-purple text-white mb-0"><i class="fas fa-user-graduate fa-fw"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-xxl-9">
            <div class="card shadow h-100">
                <div class="card-header p-4 border-bottom">
                    <h5 class="card-header-title">Data Kordinator</h5>
                </div>
                <div class="card-body">
                    <div id="chart"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-xxl-3">
            <div class="card shadow h-100">
                <div class="card-header border-bottom p-4">
                    <h5 class="card-header-title">Data Angkatan</h5>
                </div>
                <div class="card-body p-4">
                    <div class="custom-scrollbar h-300px">
                        @foreach ($angkatan as $ang)
                            <div class="d-flex justify-content-between position-relative">
                                <div class="d-sm-flex">
                                    <div class="icon-lg bg-danger text-white rounded-2 flex-shrink-0">
                                        <p><strong>{{ $alumni->where('id_angkatan', $ang->id_angkatan)->count() }}</strong>
                                        </p>
                                    </div>
                                    <div class="ms-0 ms-sm-3 mt-2 mt-sm-0">
                                        <h6 class="mb-0"><a href="#" class="stretched-link">Angkatan :
                                                {{ $ang->angkatan }}</a>
                                        </h6>
                                        <p class="mb-0">Nama Angkatan : {{ $ang->nama_angkatan }}</p>
                                        <span class="small">5 min ago</span>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var url = 'http://127.0.0.1:8000/chart';

        $.getJSON(url, function(response) {
            chart.updateSeries([{
                name: 'Sales',
                data: response
            }])
        });

        var options = {
            plotOptions: {
                bar: {
                    distributed: true
                }
            },
            chart: {
                height: 280,
                type: "bar"
            },
            dataLabels: {
                enabled: false,
            },
            series: [],
            noData: {
                text: 'Loading...'
            }
            // xaxis: {
            //     categories: [],

            // },

        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);

        chart.render();
    </script>
@endpush
