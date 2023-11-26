@extends('dashboard.layout')

@section('konten')
    <form action="{{ route('profile.update' ) }} " method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-between">
          <div class="col-5">
            <h3>Profile</h3>
            @if (get_meta_value('_foto'))
                <img src="{{asset('foto')."/".get_meta_value('_foto')}}" alt="" style="max-width:200px;max-height:200px">
            @endif
            <div class="mb-3">
              <label for="_foto" class="form-label">Foto</label>
              <input type="file" name="_foto" id="_foto" class="form-control form-control-sm">
            </div>
            <div class="mb-3">
              <label for="_kota" class="form-label">Kota</label>
              <input type="text" name="_kota" id="_kota" class="form-control form-control-sm"
              value="{{get_meta_value('_kota')}}">
            </div>
            <div class="mb-3">
              <label for="_provinsi" class="form-label">Provinsi</label>
              <input type="text" name="_provinsi" id="_provinsi" class="form-control form-control-sm"
              value="{{get_meta_value('_provinsi')}}">
            </div>
            <div class="mb-3">
              <label for="_nohp" class="form-label">Nomer Hp</label>
              <input type="text" name="_nohp" id="_nohp" class="form-control form-control-sm"
              value="{{get_meta_value('_nohp')}}">
            </div>
            <div class="mb-3">
              <label for="_email" class="form-label">Email</label>
              <input type="text" name="_email" id="_email" class="form-control form-control-sm"
              value="{{get_meta_value('_email')}}">
            </div>
          </div>
          <div class="col-5">
            <h3>Akun Media Sosial</h3>
            <div class="mb-3">
              <label for="_facebook" class="form-label">Facebook</label>
              <input type="text" name="_facebook" id="_facebook" class="form-control form-control-sm"
              value="{{get_meta_value('_facebook')}}">
            </div>
            <div class="mb-3">
              <label for="_twitter" class="form-label">Twitter</label>
              <input type="text" name="_twitter" id="_twitter" class="form-control form-control-sm"
              value="{{get_meta_value('_twitter')}}">
            </div>
            <div class="mb-3">
              <label for="_linkedin" class="form-label">LingkedIn</label>
              <input type="text" name="_lingkedin" id="_lingkedin" class="form-control form-control-sm"
              value="{{get_meta_value('_lingkedin')}}">
            </div>
            <div class="mb-3">
              <label for="_github" class="form-label">Github</label>
              <input type="text" name="_github" id="_github" class="form-control form-control-sm"
              value="{{get_meta_value('_github')}}">
            </div>
          </div>
        </div>
        
        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
@endsection

