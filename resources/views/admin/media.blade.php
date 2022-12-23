@extends('admin/template')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h3>Media Uploader</h3>
        </div>
    </div>
    <form action="{{ url('admin/media/upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-6">
                <input type="file" name="myfile[]" multiple="multiple" class="form-control">
            </div>
            <div class="col-12 col-lg-6">
                <button class="btn btn-success" type="submit"><i class="fas fa-upload"></i> &nbsp; Upload</button>
            </div>
        </div>
    </form>
    <div class="row mt-1">
        <div class="col-12">
            <i class="fas fa-info-circle"></i> <i>Filename will be automatically get unique ID as prefix to avoid overwriting existing file with same name</i>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mt-5">
            <h3>Uploaded Media Files</h3>
        </div>
        @foreach($files as $row)
        <?php 
            $images_ext  = ['jpg', 'jpeg', 'png', 'gif', 'ico', 'svg', 'bmp'];
            $webp_ext = ['webp'];
            $document_ext  = ['doc', 'docx', 'pdf', 'txt', 'xls', 'xlsx', 'ppt', 'pptx', 'odt', 'ods', 'htm', 'html', 'csv', 'xml'];
            $video_ext = ['flv', 'mp4', 'mkv', 'webm', 'avi', 'mov', 'wmv', 'swf', 'ogg', 'm4p', 'm4v', 'qt', 'mpg', 'mpeg'];
            $ext = pathinfo($row->filename, PATHINFO_EXTENSION);
        ?>

        <div class="col-6 col-lg-2 p-1">
            <div class="media-wrapper h-100">
                <div class="media-img align-text-middle">
                    @if (in_array(strtolower($ext), $images_ext))
                    <img src="{{ url('public/uploads/thumbs').'/'.$row->filename }}" alt="{{ $row->filename }}">
                    @elseif (in_array(strtolower($ext), $webp_ext))
                    <img src="{{ url('public/uploads/thumbs').'/'.$row->filename }}" alt="{{ $row->filename }}">
                    @elseif (in_array(strtolower($ext), $document_ext))
                    <i class="fas fa-file-alt"></i>
                    @elseif (in_array(strtolower($ext), $video_ext))
                    <i class="fas fa-film"></i>
                    @endif
                </div>
                <div class="text-center h-100 align-text-bottom">
                    <span>File Name: {{ $row->filename }}</span><br>
                    <button onclick="copyToClipboard(this)" data-filename="{{ $row->filename }}" class="btn btn-sm display-inline btn-warning mt-1"><i class="fas fa-link"></i> Copy Link</button>
                </div>
            </div>
        </div>
        @endforeach

        <div class="col-12">
            {{ $files->links() }}
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    function copyToClipboard(element) {
        var filename = $(element).data('filename');
        navigator.clipboard.writeText('{{ url('public/uploads') }}/'+filename);
        $(element).html('Copied...');
        setTimeout(function(){
            $(element).html('<i class="fas fa-link"></i> Copy Link');
        }, 1000);
    }
</script>
@endsection