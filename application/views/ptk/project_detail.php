<div class="clearfix"></div>

<div class="x_title">
    <h1>Project Specification</h1>
    <div class="clearfix"></div>
</div>

<div class="x_panel">
<form id="specform" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url("ptk/savespec/").$data['project']['project_id']; ?>" method="post">

<div class="x_title">
    <div class="form-group">
        <label for="projectname" class="control-label col-md-3 col-sm-3 col-xs-12">Project Name</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input value='<?php if(isset($data['project']) && $data['project'] != NULL) echo $data['project']['project_name']; ?>' class='form-control col-md-7 col-xs-12' type='text' name='project_name'>
        </div>
    </div>
    <!-- <h1><?php echo $data['project']['project_name'] ?></h1> -->
    <div class="clearfix"></div>
</div>

<div class="x_title">
    <div class="form-group">
        <label for="stakeholder" class="control-label col-md-3 col-sm-3 col-xs-12">Stakeholder</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input value='<?php if(isset($data['project']) && $data['project'] != NULL) echo $data['project']['nama']; ?>' class='form-control col-md-7 col-xs-12' type='text' name='nama' disabled>
        </div>
    </div>
    <!-- <h2><strong>Stackholder</strong></h2> -->
    <div class="clearfix"></div>
</div>

<div class="x_title">
    <div class="form-group">
        <label for="budget" class="control-label col-md-3 col-sm-3 col-xs-12">Budget</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input value='<?php if(isset($data['project']) && $data['project'] != NULL) echo $data['project']['budget']; ?>' class='form-control col-md-7 col-xs-12' type='text' name='budget'>
        </div>
    </div>
    <!-- <h2><strong>Budget</strong></h2> -->
    <div class="clearfix"></div>
</div>

<div class="x_title">
    <div class="form-group">
        <label for="description" class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <textarea form="specform" class='form-control col-md-7 col-xs-12' name='description'>'<?php if(isset($data['project']) && $data['project'] != NULL) echo $data['project']['description']; ?></textarea>
            <!-- <input value='<?php if(isset($data['project']) && $data['project'] != NULL) echo $data['project']['description']; ?>' class='form-control col-md-7 col-xs-12' type='text' name='description'> -->
        </div>
    </div>
    <!-- <h2><strong>Description</strong></h2> -->
    <div class="clearfix"></div>
</div>

<div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
    <button type="submit" class="btn btn-success">Submit</button>
    </div>
</div>

</form>
</div>

<div class="x_title">
    <h1>Bidder</h1>
    <div class="clearfix"></div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
  

  <div class="x_panel">
    <div class="x_title">
        <h2>Choosen Bidder</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <?php if(isset($data['choosen']) && $data['choosen'] != NULL) {
            foreach($data['choosen'] as $d){
        ?>
        <div class="x_panel">
        <div class="x_title">
            <h2><a href="<?php echo base_url("test") ?>"><?php echo $d['nama'] ?></a> (Bid: <?php echo $d['bid_value'] ?>)</h2>
            <a href="<?php echo base_url("ptk/deletechoosen/$d[project_id]/$d[user_id]"); ?>"><button type="button">Hapus</button></a>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <?php echo $d['comment'] ?>
        </div>
        </div>
        <?php }} else { echo "None";} ?>
    </div>          
    </div>
  
    <div class="x_panel">
    <div class="x_title">
        <h2>Other Bidder</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <?php if(isset($data['other']) && $data['other'] != NULL) {
            foreach($data['other'] as $d){
        ?>
        <div class="x_panel">
        <div class="x_title">
            <h2><a href="<?php base_url("test") ?>"><?php echo $d['nama'] ?></a> (Bid: <?php echo $d['bid_value'] ?>)</h2>
            <a href="<?php echo base_url("ptk/addchoosen/$d[project_id]/$d[user_id]"); ?>"><button type="button">Terima</button></a>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <?php echo $d['comment'] ?>
        </div>
        </div>
        <?php }} else { echo "None";} ?>
    </div>          
    </div>
  </div>

  </div>

  

</div>
</div>
</div>
</div>
