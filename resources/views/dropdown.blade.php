<!-- dropdown.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Laravel Dependent Dropdown  Tutorial With Example</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
  </head>
  <body>
    <div class="container">
    <h2>Laravel Cascading Dropdown</h2>
      <form action="{{route('dropdown.store')}}" method="post">
        @csrf
            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" name="name" id="" class="form-control" placeholder="Type Your Name" style="width:250px">
            </div>
            <div class="form-group">
                <label for="countries_id">Select Country:</label>
                <select name="countries_id" class="form-control" style="width:250px">
                    <option value="">--- Select Country ---</option>
                    @foreach ($countries as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="states_id">Select State:</label>
                <select name="states_id" class="form-control"style="width:250px">
                <option>--State--</option>
                </select>
            </div>
            <button class="btn btn-primary" type="submit">Save</button>
      </form>
      </div>

      <script type="text/javascript">
        jQuery(document).ready(function ()
        {
                jQuery('select[name="countries_id"]').on('change',function(){
                   var countryID = jQuery(this).val();
                   if(countryID)
                   {
                      jQuery.ajax({
                         url : 'dropdownlist/getstates/' +countryID,
                         type : "GET",
                         dataType : "json",
                         success:function(data)
                         {
                            console.log(data);
                            jQuery('select[name="states_id"]').empty();
                            jQuery.each(data, function(key,value){
                               $('select[name="states_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                         }
                      });
                   }
                   else
                   {
                      $('select[name="states_id"]').empty();
                   }
                });
        });
        </script>
  </body>
</html>