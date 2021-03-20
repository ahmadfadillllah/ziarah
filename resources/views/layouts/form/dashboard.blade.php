<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('form/images/satgas.png') }}" type="image/x-icon">

    <!-- Title Page-->
    <title>Form Pendaftaran</title>

    <!-- Icons font CSS-->
    <link href="{{ asset('form/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('form/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{ asset('form/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('form/vendor/datepicker/daterangepicker.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('form/css/main.css') }}" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">PENDAFTARAN ZIARAH KUBUR TPK MACANDA</h2>
                    <form method="POST">

                        <div class="input-group">
                            <label class="label">Nama Peziarah</label>
                            <input class="input--style-4" type="text" name="namapeziarah">
                        </div>


                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Tanggal Meninggal</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text" name="tanggalmeninggal">
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Jenis Kelamin</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Pria
                                            <input type="radio" name="jeniskelamin">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Wanita
                                            <input type="radio" name="jeniskelamin">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="input-group">
                            <label class="label">Nama Jenazah</label>
                            <input class="input--style-4" type="text" name="namajenazah">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">No. Handphone</label>
                                    <input class="input--style-4" type="text" name="nohp">
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <label class="label">Jadwal Ziarah</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="jadwalziarah">
                                    <option disabled="disabled" selected="selected">Choose option</option>
                                    <option>Subject 1</option>
                                    <option>Subject 2</option>
                                    <option>Subject 3</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>

                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="{{ asset('form/vendor/jquery/jquery.min.js') }}"></script>
    <!-- Vendor JS-->
    <script src="{{ asset('form/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('form/vendor/datepicker/moment.min.js') }}"></script>
    <script src="{{ asset('form/vendor/datepicker/daterangepicker.js') }}"></script>

    <!-- Main JS-->
    <script src="{{ asset('form/js/global.js') }}"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
