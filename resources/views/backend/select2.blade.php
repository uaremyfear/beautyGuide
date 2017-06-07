<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>

  <!-- stylesheets -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
</head>

<body>
<p>select2 select box:</p>
  <p>
    <select id="select2" style="width:300px" multiple="mutiple">
      <optgroup label="Alaskan/Hawaiian Time Zone">
        <option value="AK">Alaska</option>
        <option value="HI">Hawaii</option>
      </optgroup>      
    </select>
  </p>
   <script>
    $(function(){
      // turn the element to select2 select style
      $('#select2').select2();
    });
  </script>
</body>

</html>