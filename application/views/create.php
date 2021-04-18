<!DOCTYPE html>
<html>
<head>
	<title>AJAX Drop-Down Menu</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container pt-3">
  <div class="row">
    <div class="col-md-12">
      <h2 class="text-center bg-dark text-white pb-2">AJAX Drop-Down Menu</h2>
    </div>
    
    <div class="col-md-12">
      <form method="post" action="<?php //echo base_url('Home/index'); ?>">
        
        <div class="form-group row">
            <label class="col-sm-3 text-right control-label col-form-label">Name </label>
            <div class="col-sm-9">
               <input type="text" name="name" id="name" class="form-control">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 text-right control-label col-form-label">Email </label>
            <div class="col-sm-9">
               <input type="email" name="email" id="email" class="form-control">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 text-right control-label col-form-label">Country</label>
            <div class="col-sm-9">
              <select name="countries" id="countries" class="form-control">
                <option value="">Select a Country</option>
                <?php
                if (!empty($countries)) {
                  foreach ($countries as $country) { ?>

                  <option value="<?php echo $country['id']; ?>"><?php echo $country['name']; ?></option>

                <?php  } } ?>
              </select>
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-3 text-right control-label col-form-label">State</label>
            <div class="col-sm-9">
              <div id="stateBox">
                <select name="states" id="states" class="form-control">
                  <option value="">Select a State</option>
                </select>
              </div>
            </div>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary float-right" name="insert">Insert</button>
          <button type="reset" class="btn btn-default float-right" >Clear</button>
        </div>
        
      </form>
    </div>
  </div>
</div>
</body>

<script type="text/javascript">
  $("document").ready(function(){
    $("#countries").change(function(){

      var country_id = $(this).val(); //alert(country_id);

      $.ajax({
        url:'<?php echo base_url('Home/getState'); ?>',
        type: 'POST',
        data:{country_id:country_id},
        dataType:'json',
        success: function(response) {
          //console.log(response);
          //$("#states").html(response);
          if (response['states']) {
            $("#stateBox").html(response['states']);
          }
        }
      });
    });
  });

</script>


</html>
