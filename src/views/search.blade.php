<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}">
    <title>Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.min.css"/>
</head>
<body style="font-family: IRANSans">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" style="margin-top: 50px">
                <div class="panel-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="search" id="search" class="form-control" placeholder="دنبال چه فایلی هستی؟"/>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive" style="direction: rtl">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>عنوان</th>
                                <th>توضیحات</th>
                                <th>لینک</th>
                                <th>قیمت(تومان)</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <div class="text-center" id="error-box">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="http://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function () {
        $('#search').on('keyup', function () {

            var value = $(this).val();
            jQuery.ajax({
                type: "GET",
                url: "{{URL::to('/search')}}",
                data: {'search': value},
                success: function (data) {
                    var error_box = $('#error-box');
                    var table_body = $('tbody');
                    if (data == '') {
                        error_box.html('<div class="alert alert-danger">\n' +
                            '                <p>اوه چیزی پیدا نشد!</p>\n' +
                            '            </div>');
                        table_body.empty();
                    } else {
                        $('tbody').html(data);
                        error_box.empty();

                    }
                }

            })

        });

    });

</script>
</body>
</html>
