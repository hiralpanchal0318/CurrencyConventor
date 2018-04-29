<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Currency Rate </title>
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
    <script src="js/script.js"></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div><br />
      @endif
      @if (\Session::has('success'))
      <div class="alert alert-success">
          <p>{{ \Session::get('success') }}</p>
      </div><br />
      @endif
      @if (\Session::has('error'))
      <div class="alert alert-danger">
          <p>{{ \Session::get('error') }}</p>
      </div><br />
      @endif
    <div class="container">
      <h2>Get Currency rate on pervious Bdate(EUR TO INR)</h2><br  />
      <form method="post" action="{{url('bdate')}}" onsubmit="return validateForm()">
        {{csrf_field()}}
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="name">Bdate:</label>
            <input type="text" class="form-control" name="bdate"  id="datepicker" readonly="true">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success" style="margin-left:38px" >Fetch Rates</button>
          </div>
        </div>
      </form>
    </div>


    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Bdate</th>
        <th>Rate</th>
        <th>Count</th>
      </tr>
    </thead>
    <tbody>
      @foreach($results as $row)
      <tr>
        <td>{{$row['id']}}</td>
        <td>{{$row['bdate']}}</td>
        <td>{{$row['rate']}}</td>
        <td>{{$row['counter']}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </body>
</html>

