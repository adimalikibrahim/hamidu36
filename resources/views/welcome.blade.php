@extends('layouts.web.appWeb')

@section('title', 'Hamidu')

@section('konten')
    <section class="pt-5">
        <div class="container">
            <div class="row  g-4 mb-4">
                <div class="col-md-4 col-xxl-4">
                    <a href="/hamidu/kordinator">
                        <div class="card card-body bg-warning bg-opacity-15 p-4 h-100">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h2>{{ $jmlKor }}</h2>
                                    <span class="mb-0 h6 fw-light">Kordinator</span>
                                </div>
                                <div class="icon-lg rounded-circle bg-warning text-white mb-0"><i
                                        class="fas fa-hotel fa-fw"></i></div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 col-xxl-4">
                    <a href="/hamidu/angkatan">
                        <div class="card card-body bg-blue bg-opacity-15 p-4 h-100">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h2>{{ $jmlAng }}</h2>
                                    <span class="mb-0 h6 fw-light">Angkatan</span>
                                </div>
                                <div class="icon-lg rounded-circle bg-blue text-white mb-0"><i
                                        class="fas fa-university fa-fw"></i></div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 col-xxl-4">
                    <a href="/hamidu/alumni">
                        <div class="card card-body bg-primary bg-opacity-10 p-4 h-100">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h2> {{ $jmlAlm }}</h2>
                                    <span class="mb-0 h6 fw-light">Seluruh Alumni</span>
                                </div>
                                <div class="icon-lg rounded-circle bg-primary text-white mb-0"><i
                                        class="fas fa-users fa-fw"></i></div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-xxl-6">
                    <a href="/hamidu/alumni">
                        <div class="card card-body bg-success bg-opacity-10 p-4 h-100">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="d-flex">
                                        <h2>{{ $hamidu }}
                                        </h2>
                                    </div>
                                    <span class="mb-0 h6 fw-light">Hamidu</span>
                                </div>
                                <div class="icon-lg rounded-circle bg-success text-white mb-0"><i
                                        class="fas fa-user-tie fa-fw"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-xxl-6">
                    <a href="/hamidu/alumni">
                        <div class="card card-body bg-purple bg-opacity-10 p-4 h-100">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h2> {{ $sawahud }}
                                    </h2>
                                    <span class="mb-0 h6 fw-light">Sawahud</span>
                                </div>
                                <div class="icon-lg rounded-circle bg-purple text-white mb-0"><i
                                        class="fas fa-user-graduate fa-fw"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row g-4 mb-4">
                <div class="col-xxl-12">
                    <div class="card shadow h-100">
                        <div class="card-header p-4 border-bottom">
                            <h5 class="card-header-title">Data Kordinator</h5>
                        </div>
                        <div class="card-body">
                            <div id="chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        var url = '/chart';

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
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);

        chart.render();
    </script>
@endpush
