<div class="clearfix"></div>

<div class="x_title">
    <h1>Add Balance</h1>
    <div class="clearfix"></div>
</div>

<div class="x_panel">
<form id="specform" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url("ptk/addbalance/").$data['profile']['user_id']; ?>" method="post">

<div class="x_title">
    <div class="form-group">
        <label for="projectname" class="control-label col-md-3 col-sm-3 col-xs-12">Current Balance</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input value='<?php echo $data['profile']['saldo']; ?>' class='form-control col-md-7 col-xs-12' type='text' name='project_name' disabled>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

<div class="x_title">
    <div class="form-group">
        <label for="balance" class="control-label col-md-3 col-sm-3 col-xs-12">Balance</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input class='form-control col-md-7 col-xs-12' type='text' name='saldo'>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

<div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
    <button type="submit" class="btn btn-success">Submit</button>
    </div>
</div>

</form>
  

</div>
</div>
</div>
</div>
