<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Ingrdnts - Find what food you can make!</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!--<script src="https://cdn.jsdelivr.net/npm/vue"></script>-->
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link href="css/tokenize2.css" rel="stylesheet">
        <script src="js/tokenize2.js"></script>
        <style>
            body{
                padding: 1em;
            }
        </style>
    </head>
    <body>
        <div class="container" style="width: 100%; ">
            <div class="row">
                <div class="col-lg-2 col-lg-offset-5">
                    <h1 style="text-align: center;">Ingrdnts</h1>
                </div>
            </div>
            <div class="row" style="margin-bottom: 1.5em;">
                <div class="col-lg-6 col-lg-offset-3">
                    <font style="text-align: center; display: block;">Tell us what you have left and we will show what you can make!</font>
                </div>
            </div>
            <div class="row" style="margin: 0 auto;">
                <div class="col-lg-6 col-lg-offset-3">
                        <select class="ingr" id="ingr" name="ingr_list[]" multiple>
                            @foreach($ingrs as $ingr)
                            <option value="{{$ingr->ingr_id}}">{{$ingr->ingr_name}}</option>
                            @endforeach
                        </select>

                        <input type="submit" id="submit" name="submit" class="btn btn-primary btn-submit" value="Get me them recipes!" style="display: block; margin: 0 auto;">
                </div>
            </div>
            <div class="row" id="loadingDiv" style="margin-top: 1em;" hidden="true">
                <img style="max-width: 5em; margin: 0 auto; display: block;" src="{{ url('/') }}/loading.gif"/>
            </div>
            <div class="row" style="margin: 0 auto;">
                <div class="col-lg-6 col-lg-offset-3" id="display-recipes">
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).on('click','#submit',function(){
                var dataId = $(this).data("id");
                var ingr_list = $('#ingr').val();
                var ingr_list_length = ingr_list.length;
                var token = $('meta[name="csrf-token"]').attr('content');
                console.log(token);
                console.log(ingr_list);
                var $loading = $('#loadingDiv').hide();
                $(document)
                  .ajaxStart(function () {
                    $loading.show();
                  })
                  .ajaxStop(function () {
                    $loading.hide();
                  });
                console.log("Test:"+ingr_list_length);
                if(ingr_list_length >= 2){
                    $.ajax({
                        type:'POST',
                        url:"{!! URL::to('find') !!}",
                        dataType: 'JSON',
                        data: {
                            "_method": 'POST',
                            "_token": token,
                            "ingr_list": ingr_list,
                        },
                        success:function(data){
                            console.log('success');
                            console.log(data);
                            console.log(data.length);
                           $('#display-recipes').html(data['html']);
                        },
                        error:function(){

                        },
                    });
                }else{
                    alert('You need at least two ingredients!');
                }
                
            });
        </script>
        <script type="text/javascript">
            $('.ingr').tokenize2();
        </script>
    </body>
</html>