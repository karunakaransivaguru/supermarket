<!DOCTYPE html>
<html lang="en">
<head>
  <title>Super Market</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body style="background-color:powderblue;">
<div class="lead text-center" style ="background-color:grey;">
  <h1>Super Market</h1>
</div>
<div class="container">
  <div class="row">
  <form action="{{route('store')}}" method="POST" enctype="multipart-data">
  {{csrf_field()}}
  <div class="form-group col-sm-4">
  <label for="item_code">Item Code</label>
    <select class="form-select form-control" aria-label="Default select example" name="itemcode" required>
    <option value="" Selected>Select</option>
    <option value="A">ITEM-A</option>
    <option value="B">ITEM-B</option>
    <option value="C">ITEM-C</option>
    <option value="D">ITEM-D</option>
    <option value="E">ITEM-E</option>
    </select>
  </div>
  <div class="form-group col-sm-4">
  <label for="quantity">Quantity</label>
    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter quanity" required min="0" value = "">
  </div>
  <div class="text-center">
  <button type="submit" class="btn btn-primary">Submit</button></div>
</form>

  </div>
</div>

@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <p><strong>Opps Something went wrong</strong></p>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

</body>
</html>
