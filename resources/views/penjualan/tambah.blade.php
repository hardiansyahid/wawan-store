@extends('layout.base')
@section('title', 'Tambah Penjualan')

@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
@endsection

@section('content')
    <div class="container-fluid px-4">

        <div class="d-flex w-100 justify-content-between">
            <div class="align-self-center">
                <h1 class="mt-4">Tambah Penjualan</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Manajemen Penjualan</li>
                </ol>
            </div>

            <div class="align-self-center">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahBarang">
                    TAMBAH
                </button>
            </div>
        </div>

        <form>
            <table class="table table-bordered table-striped" id="tableBarangPenjualan">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td colspan="4">TOTAL BAYAR</td>
                        <td id="totalBayar"></td>
                    </tr>
                </tfoot>
                <tbody id="rowBarangPenjualan">
                </tbody>
            </table>
        </form>

        <div class="d-flex justify-content-between mt-5">
            <a class="btn btn-secondary" href="{{url('penjualan')}}">KEMBALI</a>
            <button class="btn btn-primary" onclick="submitData()">SIMPAN</button>
        </div>

        <div class="modal fade" id="modalTambahBarang" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="w-100">
                            <label for="barang">Pilih Barang</label>
                            <select class="form-control my-select2" id="barang" name="barang">
                                <option value="">Pilih Barang</option>
                            </select>
                        </div>

                        <div class="mt-3">
                            <label for="jumlah">Jumlah</label>
                            <input type="text" class="form-control" id="jumlah" name="jumlah">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="tambahBarang()">TAMBAH</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    @include('layout.components.select2')
    @include('layout.components.axios')

    <script>
        const barang_list = {!! json_encode($barang) !!};

        $( document ).ready(function() {
            $('.my-select2').select2({
                dropdownParent: $('#modalTambahBarang'),
                theme: 'bootstrap-5'
            });
            setListBarang();
        });

        function handleGetTotalBayar(){
            let totalHarga = 0;
            $("#rowBarangPenjualan tr").each(function() {
                const harga = parseInt($(this).find(".total").text());
                totalHarga += harga;
            })
            $('#totalBayar').html(totalHarga)
        }

        function tambahBarang(){
            let barang = $('#barang').val();
            let jumlah = $('#jumlah').val();

            let selectedBarang = getListBarang(barang)

            $('#rowBarangPenjualan').append(`
                <tr>
                    <td class="barang">${selectedBarang.nama}</td>
                    <td class="barang_id hide">${selectedBarang.id}</td>
                    <td class="harga">${selectedBarang.harga}</td>
                    <td class="jumlah">${jumlah}</td>
                    <td class="total">${parseInt(selectedBarang.harga) * jumlah}</td>
                </tr>
            `)

            handleGetTotalBayar();
            $('#jumlah').val("");
            $('#modalTambahBarang').modal('hide');
        }

        function setListBarang(){
            let option = ``;
            let barang = getListBarang();
            if(barang.length > 0){
                $.each(barang , (key, value) => {
                    option += `<option value="${value.id}">${value.nama}</option>`;
                })
            }

            $('#barang').html(option);
        }

        function getListBarang(id = null) {
            let barang = barang_list;

            if (id === null) {
                return barang;
            } else {
                let found = barang.find((element) => element.id == id);
                return found;
            }
        }

        function submitData(){
            let detailTransaksiParam = [];
            let totalHarga = 0;

            $("#rowBarangPenjualan tr").each(function() {

                const barang_id = parseInt($(this).find(".barang_id").text());
                const harga = parseInt($(this).find(".harga").text());
                const jumlah = parseInt($(this).find(".jumlah").text());
                const total = parseInt($(this).find(".total").text());

                totalHarga += total;

                if(
                    (barang_id !== undefined || true) &&
                    (harga !== undefined || true) &&
                    (jumlah !== undefined || true) &&
                    (total !== undefined || true)
                ){
                    detailTransaksiParam.push({
                        barang_id : barang_id,
                        harga : harga,
                        jumlah : jumlah,
                        total : total
                    })
                }
            })

            if(detailTransaksiParam.length > 0){

                let param = {
                    total_bayar : totalHarga,
                    detailTransaksi : detailTransaksiParam
                }

                axios.post("{{url('penjualan/store')}}", param).then(res => {
                    let msg = "Transaksi berhasil disimpan";
                    if(res?.data?.message) msg = res?.data?.message;
                    alert(msg)
                    if (res?.status === 200) {
                        window.location.href = "{{ url('penjualan') }}";
                    }
                }).catch(err => {
                    alert("terjadi kesalahan")
                    console.error(err)
                    console.log(err?.response?.data?.message)
                })
            }else{
                alert("data tidak boleh kosong")
            }
        }
    </script>
@endsection
