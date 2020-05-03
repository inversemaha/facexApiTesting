<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<link href="/asset/style.css" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <form class="form-horizontal" method="POST" action="/face-compare-check" enctype="multipart/form-data">
            <div class="col-md-6">
                <div class="form-group row">
                    <h3>Face Compare Check</h3>
                    <br>
                    <label>Upload Your File </label>
                    <input type="file" class="form-control" multiple="" name="image1" required>
                    <input type="hidden" class="form-control" name="_token"
                           value="{{csrf_token()}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label>Upload Your File </label>
                    <input type="file" class="form-control" multiple="" name="image2" required>
                </div>
            </div>
            <div class="form-group row">
                <button type="submit" class="btn btn-block w-sm btn-success waves-effect waves-light">Submit
                </button>
            </div>
        </form>
    </div>
</div>

