<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi Calon Siswa</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset("fonts/material-icon/css/material-design-iconic-font.min.css") }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset("css/style_registrasi.css") }} ">
</head>
<body>

    <div class="main">
        <div class="container-hi">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="{{ asset("images/student.jpg") }}" alt="">
                </div>
                <div class="signup-form">
                    <form class="register-form" id="register-form" method="POST" action="{{ url ('/registrasi') }}">
                        {{ csrf_field() }}
                        <h2>Form Registrasi Calon Siswal</h2>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">Nama :</label>
                                <input type="text" name="nama" class="form-control"  id="nama" required/>
                            </div>
                            <div class="form-group">
                                <label for="father_name">Nama Ayah :</label>
                                <input type="text" name="nama_ayah" class="form-control"  id="nama_ayah" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">Alamat :</label>
                            <textarea name="alamat" class="form-control" id="alamat" cols="70"  rows="5" required></textarea>
                        </div>
                        <div class="form-radio">
                            <label for="gender" class="radio-label">Jenis Kelamin :</label>
                            <label class="radio-inline"><input type="radio" name="jenis_kelamin" value="Laki-Laki" checked>Laki-Laki</label>
                            <label class="radio-inline"><input type="radio" name="jenis_kelamin" value="Perempuan">Perempuan</label>
                        </div>
                        <div class="form-group">
                            <label for="birth_date">Sekolah/Univ/Tempat Kerja :</label>
                            <input type="text" class="form-control"  name="sekolah" id="tempat_sekolah" required>
                        </div>
                        <div class="form-group">
                            <label for="birth_date">Pekerjaan :</label>
                            <input type="text" class="form-control"  name="pekerjaan" id="pekerjaan" required>
                        </div>
                        <div class="form-group">
                            <label for="birth_date">No Hp :</label>
                            <input type="text" class="form-control"  name="no_hp" id="no_hp">
                        </div>

                        <!--<div class="form-group">
                          <label for="birth_date">Dari mana Anda mengetahui "Day to Day English"  :</label>
                          <div class="checkbox">
                            <label><input type="checkbox" value="">Teman</label>
                          </div>
                          <div class="checkbox">
                            <label><input type="checkbox" value="">Brosur</label>
                          </div>
                          <div class="checkbox">
                            <label><input type="checkbox" value="">Media Sosial</label>
                          </div>
                        </div>-->


                        <div class="form-group">
                            <label for="birth_date">Email :</label>
                            <input type="text" class="form-control"  name="email" id="email">
                        </div>
                        <div class="form-group">
                            <label for="birth_date">Password :</label>
                            <input type="password" class="form-control"  name="password" id="password">
                        </div>
                        <div class="form-submit">
                            <a href="{{ url('/') }}" class="btn btn-default btn-lg" style="background-color:#fff;">Batal</a>
                            <button type="submit" class="btn btn-primary btn-lg">
                                Daftar
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="{{ asset("js/main.js") }}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
