<!DOCTYPE html>
<html lang="en">

<head>

    <!-- CSS -->
    @include('partials.css')

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        @include('partials.navbar')
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        @include('partials.header')
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('partials.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->

        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>PRASARANA</h4>
                            <span class="ml-1">Biro Administrasi Umum</span>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Data Ruang</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Data</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-xl-6 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" >Tambah Data Ruang</h4>
                            </div>
                            <hr>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ route('store-room')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        {{--  Nomor Ruang  --}}
                                        <div class="form-group">
                                            <h6>Nomor Ruang</h6>
                                            <input type="text" class="form-control input-default @error('no_ruang') is-invalid @enderror" id="no_ruang" name="no_ruang" value="{{ old('no_ruang') }}" placeholder="Misal: 168">
                                        <!-- error message untuk nomor ruang -->
                                        @error('no_ruang') <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        </div>
                                        {{--  Nama Gedung  --}}
                                        <div class="form-group">
                                            <h6>Nama Gedung</h6>
                                            <input type="text" class="form-control input-default @error('gedung') is-invalid @enderror" name="gedung" value="{{ old('gedung') }}" placeholder="Misal: G">
                                        <!-- error message untuk nama gedung -->
                                        @error('gedung') <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        </div>
                                        {{--  Nama Ruang  --}}
                                        <div class="form-group">
                                            <h6>Nama Ruang</h6>
                                            <input type="text" class="form-control input-default @error('nama_ruang') is-invalid @enderror" name="nama_ruang" value="{{ old('nama_ruang') }}" placeholder="Misal: Biro Administrasi Umum (BAU)">
                                        <!-- error message untuk nama ruang -->
                                        @error('nama_ruang') <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        </div>
                                        {{--  Kategori  --}}
                                        <div class="form-group">
                                            <h6>Kategori Ruang</h6>
                                            <select class="form-control input-default @error('nama_ruang') is-invalid @enderror" value="{{ old('nama_ruang') }}"  name="kategori" id="kategori">
                                                <option>Pilih Kategori Ruang</option>
                                                <option value="Kantor">Kantor</option>
                                                <option value="Kelas">Kelas</option>
                                                <option value="Fasilitas Umum">Fasilitas Umum</option>
                                            </select>
                                            <!-- error message untuk nama ruang -->
                                        @error('kategori') <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        </div>
                                        
                                        {{--  Luas  --}}
                                        <div class="form-group">
                                            <h6>Luas</h6>
                                            <input type="text" class="form-control input-default @error('luas') is-invalid @enderror" name="luas" value="{{ old('luas') }}" placeholder="Misal: 7 x 4 m">
                                        <!-- error message untuk luas -->
                                        @error('luas') <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        </div>
                                        {{--  Foto Depan  --}}
                                        <div class="form-group">
                                            <h6>Foto Depan Ruang</h6>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" name="foto_depan" class="form control-file custom-file-input form-control @error('foto_depan') is-invalid @enderror" name="foto_depan" id="foto_depan" value="{{ old('foto_depan') }}">
                                                    <label class="custom-file-label">Choose file</label>
                                                </div>
                                            </div>
                                            <!-- error message untuk foto depan -->
                                            @error('foto_depan')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        {{--  Foto Ruang  --}}
                                        <div class="form-group">
                                            <h6>Foto Ruang</h6>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input form-control @error('foto_ruang') is-invalid @enderror" id="foto_ruang" name="foto_ruang" value="{{ old('foto_ruang') }}">
                                                    <label class="custom-file-label">Choose file</label>
                                                </div>
                                            </div>
                                            <!-- error message untuk foto ruang -->
                                            @error('foto_ruang')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        </div>

                                        <button type="submit" class="btn btn-md btn-primary me-3">SAVE</button>
                                        <button type="reset" class="btn btn-md btn-warning">RESET</button>
                            
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        @include('partials.footer')
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    {{--  Scrip Menampilkan Pesan  --}}

    @include('partials.js')

</body>

</html>