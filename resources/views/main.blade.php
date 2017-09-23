<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ingrdnts - Find what food you can make!</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link href="css/tokenize2.css" rel="stylesheet">
        <script src="js/tokenize2.js"></script>
        <style>
            *{
                font-size: 100%;
            }
            body{
                height: 100%;
                padding: 1em;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row" style="width: 100%; margin-bottom: 1em;">
                <h1 style="text-align: center;">Ingrdnts</h1>
            </div>
            <div class="row" style="width: 40%; display: block; margin: 0 auto;">
                <form method="POST" action="/check">
                    {{ csrf_field() }}
                    
                    <select class="demo" multiple>
                      <option value="1">Onion</option>
                      <option value="2">Leek</option>
                      <option value="3">Eggs</option>
                      <option value="4">Beef</option>
                      <option value="5">Chicken</option>
                      <option value="6">Turkey</option>
                      <option value="7">Rice</option>
                      <option value="8">Something</option>
                    </select>

                </form>
            </div>
            <div class="row" style="width: 40%; margin: 0 auto;">
                <h2>Recipes</h2>
                <ul>
                    <li>
                        <font style="font-size: 1.5em;">Something delicious!</font>
                    </li>
                    <li>
                        <font style="font-size: 1.5em;">Another delicious food!</font>
                    </li>
                </ul>
            </div>
        </div>
        
        <script type="text/javascript">
            $('.demo').tokenize2();
        </script>
    </body>
</html>