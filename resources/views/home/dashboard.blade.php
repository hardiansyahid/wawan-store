@extends('layout.base')
@section('title', 'Dashboard')
@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex w-100 justify-content-between">
            <div class="align-self-center">
                <h1 class="mt-4">Dashboard Penjualan</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Wawan Store</li>
                </ol>
            </div>

            <form class="align-self-center" action="{{url('dashboard')}}" method="GET">
                @csrf
                @method("GET")
                <div class="d-flex">
                    <div class="mx-2 align-self-center">
                        <select name="tahun" id="tahun" class="form-control">
                            <option value="">Pilih Tahun</option>
                            @foreach($tahunListTransaksi as $tahun)
                                <option value="{{$tahun->tahun}}">{{$tahun->tahun}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mx-2 align-self-center">
                        <button type="submit" class="btn btn-primary">TAMPILKAN</button>
                    </div>
                </div>
            </form>
        </div>


        <div class="row">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Total Penjualan (Rp)
                </div>
                <div class="card-body">
                    <canvas id="dashboardChartBar" width="100%" height="40"></canvas>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Barang Terlaris
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Total Penjualan</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($barangTerlaris as $barangTerlaris)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $barangTerlaris->nama }}</td>
                            <td>{{ $barangTerlaris->harga }}</td>
                            <td>{{ $barangTerlaris->total_penjualan }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function (){
            barChart();
        })

        function barChart(){
            // Set new default font family and font color to mimic Bootstrap's default styling
            Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#292b2c';

            // Bar Chart Example
            var ctx = document.getElementById("dashboardChartBar");
            var myLineChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($labelSeries) !!},
                    datasets: [{
                        label: "Penjualan",
                        backgroundColor: "rgba(2,117,216,1)",
                        borderColor: "rgba(2,117,216,1)",
                        data: {!! json_encode($dataSeries) !!},
                    }],
                },
                options: {
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'month'
                            },
                            gridLines: {
                                display: false
                            },
                            ticks: {
                                maxTicksLimit: 6
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                min: 0,
                                maxTicksLimit: 5,
                                callback: function (value, index, values) {
                                    return `Rp ${value.toLocaleString()}`; // Menggunakan pemisah ribuan
                                }
                            },
                            gridLines: {
                                display: true
                            }
                        }],
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        callbacks: {
                            label: function (tooltipItem, data) {
                                var label = data.datasets[tooltipItem.datasetIndex].label || '';
                                label += ': Rp ' + tooltipItem.yLabel.toLocaleString(); // Format angka dengan pemisah ribuan
                                return label;
                            }
                        }
                    }
                }
            });
        }
    </script>
@endsection
