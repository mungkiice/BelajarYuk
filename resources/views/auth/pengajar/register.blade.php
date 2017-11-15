@extends('auth.pengajar.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('pengajar.register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="nama" class="col-md-4 control-label">Nama</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="nama" value="{{ old('nama') }}" required autofocus>

                                @if ($errors->has('nama'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nama') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('no_telp') ? ' has-error' : '' }}">
                            <label for="no_telp" class="col-md-4 control-label">No Telephone</label>

                            <div class="col-md-6">
                                <input id="no_telp" type="number" class="form-control" name="no_telp" required>

                                @if ($errors->has('no_telp'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('no_telp') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('no_ktp') ? ' has-error' : '' }}">
                            <label for="no_ktp" class="col-md-4 control-label">NIK</label>

                            <div class="col-md-6">
                                <input id="no_ktp" type="number" class="form-control" name="no_ktp" required>

                                @if ($errors->has('no_ktp'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('no_ktp') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                            <label for="alamat" class="col-md-4 control-label">Alamat</label>

                            <div class="col-md-6">
                                <textarea id="alamat" type="text" class="form-control" name="alamat" required></textarea>
                                @if ($errors->has('alamat'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('alamat') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('foto') ? ' has-error' : '' }}">
                            <label for="foto" class="col-md-4 control-label">Foto</label>

                            <div class="col-md-6">
                                <input id="foto" type="file" class="form-control" name="foto" required>

                                @if ($errors->has('foto'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('foto') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="gender" class="col-md-4 control-label">Gender</label>

                            <div class="col-md-6">
                                {{-- <input id="password" type="password" class="form-control" name="password" required> --}}
                                <select class="form-control" name="gender" id="gender">
                                    <option value="Laki-Laki">Laki - Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                @if ($errors->has('gender'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('gender') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('pendidikan_terakhir') ? ' has-error' : '' }}">
                            <label for="pendidikan_terakhir" class="col-md-4 control-label">Pendidikan Terakhir</label>

                            <div class="col-md-6">
                                <input id="pendidikan_terakhir" type="text" class="form-control" name="pendidikan_terakhir" required>

                                @if ($errors->has('pendidikan_terakhir'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('pendidikan_terakhir') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tarif') ? ' has-error' : '' }}">
                            <label for="tarif" class="col-md-4 control-label">Tarif Mengajar per Sesi</label>

                            <div class="col-md-6">
                                <input id="tarif" type="number" class="form-control" name="tarif" required>

                                @if ($errors->has('tarif'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tarif') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('kecamatan_id') ? ' has-error' : '' }}">
                            <label for="kecamatan_id" class="col-md-4 control-label">Kecamatan</label>

                            <div class="col-md-6">
                                <select class="form-control" name="kecamatan_id" id="kecamatan_id" required>
                                    <option></option>
                                </select>
                                @if ($errors->has('kecamatan_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('kecamatan_id') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('kabupaten_id') ? ' has-error' : '' }}">
                            <label for="kabupaten_id" class="col-md-4 control-label">Kabupaten</label>

                            <div class="col-md-6">
                                <select class="form-control" name="kabupaten_id" id="kabupaten_id" required>
                                    <option></option>
                                </select>
                                @if ($errors->has('kabupaten_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('kabupaten_id') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
