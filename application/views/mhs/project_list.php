<div class="clearfix"></div>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_title">
        <h1>Available Project</h1>
        <div class="clearfix"></div>
    </div>
        <?php
            if(!isset($data['project-list']) || $data['project-list'] == NULL){
                echo "<h2>No available project</h2>";
            } else {
                foreach($data['project-list'] as $d) {
        ?>
    <a href="<?php echo base_url('mhs/projectdetail') . "/$d[project_id]" ?>">
    <div class="x_panel">
        <div class="x_title">
            <h2><strong><?php echo $d['project_name'] ?></strong></h2>
            <div class="clearfix"></div>
        </div>

        <div class="x_content">
            <strong>Stakeholder</strong> <?php echo $d['nama'] ?> <br/>
            <strong>Budget</strong> <?php echo $d['budget'] ?> <br/>
        </div>

    </div>
    </a>

        <?php
                }
            }
        ?>

</div>