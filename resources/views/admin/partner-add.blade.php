@extends('admin/template')
@section('content')
<div class="container-fluid p-0">
    <h3 class="mb-3">Create New Partner Post</h3>
    <form action="{{ url('admin/partner/create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-3">
                Title <sup>*</sup>
            </div>
            <div class="col-12 col-lg-9 mb-2">
                <input type="text" name="title" required="required" class="form-control" maxlength="255">
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-3">
                Slug <sup>*</sup>
            </div>
            <div class="col-12 col-lg-9 mb-2">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon3">{{ url('/') }}/partner/</span>
                    <input type="text" name="slug" required="required" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-3">
                Featured Image URL <i class="fas fa-info-circle"  data-bs-toggle="tooltip" data-bs-placement="right" title="Recommended Resolution (1300 x 450 pixels). Image will be cropped from center in the partner list page, but will show full size in the single partner page."></i>
            </div>
            <div class="col-12 col-lg-9 mb-2">
                <input type="text" name="featured_image" placeholder="Image URL (leave empty if no featured image)" class="form-control">
                <a href="{{ url('admin/media') }}" target="_blank"><i class="fas fa-share"></i>  Open Media Uploader in New Tab</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-3">
                Pinned as Headline? <i class="fas fa-info-circle"  data-bs-toggle="tooltip" data-bs-placement="right" title="This will replace currently pinned headline."></i>
            </div>
            <div class="col-12 col-lg-9 mb-2">
                <select name="is_pinned" class="form-select">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-3">
                Language <sup>*</sup>
            </div>
            <div class="col-12 col-lg-9 mb-2">
                <select name="language" required="required" class="form-select">
                    <option value="en" selected="selected">English</option>
                    <option value="id">Indonesian</option>
                    <option value="zh">Chinese</option>
                    <option value="ur">Urdu / Hindi</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-3">
                Content <sup>*</sup>
            </div>
            <div class="col-12 col-lg-12 mb-2">
                <textarea name="news_content" rows="25" class="form-control"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <input type="hidden" name="visibility" value="1">
                <button class="btn btn-lg btn-info px-5" id="btn-draft"><i class="fas fa-save"></i> &nbsp; Save Draft</button>
                <button class="btn btn-lg btn-success px-5" id="btn-publish"><i class="fas fa-share-square"></i> &nbsp; Publish</button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('script')
<script>
    $('input[name=title]').on('change paste keyup', function(){
        var title = $(this).val();
        slug = title.toLowerCase()
                    .replace(/[^\w ]+/g, '')
                    .replace(/ +/g, '-');
        $('input[name=slug]').val(slug);
    });

    $('input[name=language]').on('change click', function(){
        var lang = $('input[name=language]:checked').val();
        console.log(lang);
        if (lang != 'en') {
            $('#basic-addon3').text('{{ url('/') }}/'+lang+'/partner/');
        } else {
            $('#basic-addon3').text('{{ url('/') }}/partner/');
        }
    });


    $('#btn-draft').on('click', function(e) {
        e.preventDefault();
        $('input[name=visibility]').val(0);
        if ($("form")[0].checkValidity()) {
            $('form').submit();
        } else {
            alert("One of your required input is not present. Please check again.");
        }
    });

    $('#btn-publish').on('click', function(e) {
        e.preventDefault();
        $('input[name=visibility]').val(1);
        if ($("form")[0].checkValidity()) {
            $('form').submit();
        } else {
            alert("One of your required input is not present. Please check again.");
        }
    });


    // window.addEventListener("beforeunload", function (e) {
    //     var confirmationMessage = "Are you sure you want to leave? Your changes will not be saved";

    //     (e || window.event).returnValue = confirmationMessage; //Gecko + IE
    //     return confirmationMessage;                            //Webkit, Safari, Chrome
    // });
</script>

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