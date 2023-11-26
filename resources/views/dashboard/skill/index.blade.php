@extends('dashboard.layout')

@section('konten')
    <form action="{{ route('skill.update' ) }} " method="POST">
        @csrf
        <div class="mb-3">
          <label for="judul" class="form-label">PROGRAMMING LANGUANGES & TOOLS</label>
          <input type="text"
            class="form-control form-control-sm skill" name="_languange" id="judul" aria-describedby="helpId" placeholder="Programming Languange & Tools"
            value="{{ get_meta_value('_languange') }}">
          <div class="bd-3">
            <label for="isi" class="form-label">WORKFLOW</label>
            <textarea name="_workflow" id="isi" cols="5" rows="5" class="form-control summernote">{{ get_meta_value('_workflow') }}</textarea>
          </div>
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
@endsection

@push('child-stacks')
<script>
  $(document).ready(function() {
      $('.skill').tokenfield({
          autocomplete: {
              source: [{!! $skill !!}],
              delay: 100
          },
          showAutocompleteOnFocus: true
      });
  });
</script>
@endpush