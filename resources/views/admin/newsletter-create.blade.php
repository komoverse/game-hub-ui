@extends('admin/template')
@section('content')
<div class="container-fluid p-0">
    <h3 class="mb-3">Create Newsletter</h3>
    <form action="{{ url('admin/newsletter/create') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-3">
                Subject <sup>*</sup>
            </div>
            <div class="col-12 col-lg-9 mb-2">
                <input type="text" name="subject" required="required" class="form-control" maxlength="200">
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-3 mb-2">
                Message <sup>*</sup>
            </div>
            <div class="col-12 col-lg-9">
                <a href="{{ url('admin/media') }}" target="_blank"><i>Open Media Uploader in New Tab</i></a>
            </div>
            <div class="col-12 col-lg-12 mb-2">
                <textarea name="message" rows="25" class="form-control"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <input type="submit" value="Submit" class="btn btn-lg btn-primary">
            </div>
        </div>
    </form>
</div>
@endsection

@section('script')
<script>
    tinymce.init({
      selector: 'textarea',
      toolbar: 'undo redo | fontselect fontsizeselect align | bold italic underline | forecolor backcolor | bullist numlist outdent indent | hr table image',
      plugins: 'advlist autolink lists link image imagetools charmap print preview hr anchor pagebreak table wordcount',
      toolbar_mode: 'floating',
      relative_urls : false,
        remove_script_host : false,

    });
</script>
@endsection