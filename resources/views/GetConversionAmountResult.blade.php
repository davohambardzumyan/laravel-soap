<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <label>Usd To Eur</label>
    <form class="form-inline" action="{{route('get.wsdl')}}" method="post">
        {{csrf_field()}}
    <input type="number" class="form-control" placeholder="USD" name="usd">
        <input type="submit" class="btn btn-primary">
    </form>
</div>
</body>
</html>