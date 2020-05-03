<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<link href="/asset/style.css" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <form class="form-horizontal" method="POST" action="/check-image-attributes" enctype="multipart/form-data">




                <div class="form-group files">
                    <a style="margin-left: 300px;" href="/face-compare" target="_blank">Face Compare</a>
                    <br>
                    <h3>Image Attribute Check</h3>
                    <input type="file" class="form-control" multiple="" name="image" required>
                </div>
                <input type="hidden" class="form-control" name="_token"
                       value="{{csrf_token()}}">


                <div class="form-group row">
                    <button type="submit" class="btn btn-block w-sm btn-success waves-effect waves-light">Submit
                    </button>
                </div>
            </form>


        </div>
    </div>
</div>