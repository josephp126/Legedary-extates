@extends('layouts.special_default')

@section('content')

<!-- display success message -->
@if (Session::has('message'))
<div class="alert alert-success">{{ Session::get('message') }}</div>
@endif

<body>
    <div class="container-lg">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="contact-form">
                    <h1>Arts Upload</h1>
                    <form action="/home" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="inputName">Name</label>
                                    <input type="text" name="tutor_name" class="form-control" id="inputName" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 form-group">
                                <label for="inputPhone">Price</label>
                                <div class="tuition_box">
                                    <input type="number" name="tutor_tuition" class="form-control tuition" id="inputPhone" required>
                                    <span class="per"> $ </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group des">
                            <label for="inputMessage">Description</label>
                            <textarea class="form-control" name="tutor_des" id="inputMessage" rows="5" required></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('fileUpload') ? 'has-error' : '' }}">
                                    <label class="label-control">Upload Photo</label>
                                    <input type="file" name="fileUpload" class="form-control fileinput" data-show-upload="false" required="required">
                                    <i>Note: Only jpg,jpeg file allowed. Max size: 3MB</i>
                                    @if ($errors->has('fileUpload'))
                                    <span class="help-block alert alert-danger">
                                        <strong>{{ $errors->first('fileUpload') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

@push('scripts')



<script type="text/javascript">
    // for bootstrap file input
    $(function() {
        $("input.fileinput").fileinput({
            allowedFileExtensions: ["jpg", "jpeg"], // set allowed file format
            maxFileSize: 3000, //set file size limit, 1000 = 1MB
        });
    });
</script>
@endpush

@stop