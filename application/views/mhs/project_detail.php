<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h1><?php echo $data['project']['project_name'] ?></h1>
      <div class="clearfix"></div>
    </div>

    <div class="x_content">
        <div class="x_title">
            <h2>Stackholder</h1>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <?php echo $data['project']['nama'] ?> <br/>
        </div>
        <!-- <div class="clearfix"></div> -->
        <div class="x_title">
            <h2>Budget</h1>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <?php echo $data['project']['budget'] ?> <br/>
        </div>
        <div class="x_title">
            <h2>Description</h1>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <?php echo $data['project']['description'] ?> <br/>
        </div>
    </div>

  </div>

  <div class="x_panel">
    <div class="x_title">
        <h2>My Bid</h2>
        <div class="clearfix"></div>
    </div>
        <div class="x_content">
            <form data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url("mhs/bid/$data[project][project_id]"); ?>' method="post">
                <div class="form-group">
                    <label for="bid" class="control-label col-md-3 col-sm-3 col-xs-12">Bid Value</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value='<?php if(isset($data['bidder']) && $data['bidder'] != NULL) echo $data['bidder']['bid_value']; ?>' class='form-control col-md-7 col-xs-12' type='text' name='bid_value'>
                    </div>
                </div>

                <div class='form-group'>
                    <label for='comment' class='control-label col-md-3 col-sm-3 col-xs-12'>Comment</label>
                    <div class='col-md-6 col-sm-6 col-xs-12'>
                        <input value='<?php if(isset($data['bidder']) && $data['bidder'] != NULL) echo $data['bidder']['comment']; ?>' class='form-control col-md-7 col-xs-12' type='text' name='comment'>
                    </div>
                </div>
                    <?php if(isset($data['bidder']) && $data['bidder'] != NULL && $data['bidder']['bid_status'] == '0'){ ?>
                <div class='form-group'>
                    <label for='status' class='control-label col-md-3 col-sm-3 col-xs-12'>Status</label>
                    <div class='col-md-6 col-sm-6 col-xs-12'>
                        <h2>Belum Diterima</h2>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
                    <?php } else if(isset($data['bidder']) && $data['bidder'] != NULL && $data['bidder']['bid_status'] == '1'){ ?>
                <div class='form-group'>
                    <label for='status' class='control-label col-md-3 col-sm-3 col-xs-12'>Status</label>
                    <div class='col-md-6 col-sm-6 col-xs-12'>
                        <h2>Diterima</h2>
                    </div>
                </div>
                    <?php } else {?>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
                    <?php } ?>


            </form>
      
    </div>
  </div>

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
            <h2><a href="<?php base_url("mhs/profile/$d[user_id]") ?>"><?php echo $d['nama'] ?></a> (Bid: <?php echo $d['bid_value'] ?>)</h2>
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
            <h2><a href="<?php base_url("mhs/profile/$d[user_id]") ?>"><?php echo $d['nama'] ?></a> (Bid: <?php echo $d['bid_value'] ?>)</h2>
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