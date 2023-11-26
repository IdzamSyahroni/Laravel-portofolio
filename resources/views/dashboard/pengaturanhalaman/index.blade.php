@extends('dashboard.layout')

@section('konten')
    <form action="{{ route('pengaturanhalaman.update' ) }} " method="POST">
        @csrf
        <div class="form-group row">
          <label for="_halaman_about" class="col-sm-2">About</label>
          <div class="col-sm-6">
            <select name="_halaman_about" id="_halaman_about" class="form-control form-control-sm">
              <option value="">-pilih-</option>
              @foreach ($datahalaman as $item)
                  <option value="{{$item->id}}" {{get_meta_value('_halaman_about') == $item->id ? 'selected' : ''}}>{{$item->judul}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="_halaman_interest" class="col-sm-2">Interest</label>
          <div class="col-sm-6">
            <select name="_halaman_interest" id="_halaman_interest" class="form-control form-control-sm">
              <option value="">-pilih-</option>
              @foreach ($datahalaman as $item)
                  <option value="{{$item->id}}" {{get_meta_value('_halaman_interest') == $item->id ? 'selected' : ''}}>{{$item->judul}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="_halaman_award" class="col-sm-2">Award</label>
          <div class="col-sm-6">
            <select name="_halaman_award" id="_halaman_award" class="form-control form-control-sm">
              <option value="">-pilih-</option>
              @foreach ($datahalaman as $item)
                  <option value="{{$item->id}}" {{get_meta_value('_halaman_award') == $item->id ? 'selected' : ''}}>{{$item->judul}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
@endsection