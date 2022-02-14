<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    header {
            background-color: #d1d8f1;
            line-height: 35px;
            }
    footer {
            position: fixed; 
            bottom: -30px; 
            left: 0px; 
            right: 0px;
            height: 50px; 

            background-color: #d1d8f1;
            color: white;
            text-align: center;
            line-height: 40 px;
            }
    table {
          border: 1px solid #000;
    }
    th  {
            background-color: #d1d8f1;
            border: 1px solid #000;
        }
    </style>

</head>
<header>
    <br>
    <img src="{{public_path('images/logoVTD.png')}}" class="text-align-left " width="180px " alt="">
    <img src="{{public_path('images/logoIR.png')}}" class="float-right " width="180px " alt="">
</header>
<body>

    <div class="row">
        <div class="col-12 align-self-center text-center mt-5">
            <img src="{{public_path('images/cel6.png')}}" class="img-fluid" width="500px " alt="">
            <br>
            <h3>INFORME DE TRIANGULACION DE LLAMADAS DE ENTEL</h3>
        </div>
    </div>

        <footer>
            <div class="container" >
                <div class="copyright" style="color: black">
                    &copy; {{ now()->year }} {{ __('VTDfix & Irecovery') }} 
                </div>
            </div>
        </footer>
    <div style="page-break-after:always;"></div>  

    @include('entel.informeTotal.tabla')

    <div style="page-break-after:always;"></div> 

    @include('entel.informeTotal.informe')

    <div style="page-break-after:always;"></div> 

    @include('entel.informeTotal.radiobase')

</body>
</html>