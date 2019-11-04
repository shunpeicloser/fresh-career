<div class="clearfix"></div>

<div class="x_title">
    <h1><?php echo $data['profile']['nama'] ?></h1>
    <div class="clearfix"></div>
</div>

<div class="x_panel">
<div class="x_title">
    <h2><strong>Address</strong></h2>
    <div class="clearfix"></div>
</div>
<div class="x_content">
    <?php echo $data['profile']['alamat'] ?> <br/>
</div>
<div class="x_title">
    <div class="clearfix"></div>
</div>


<div class="x_title">
    <h2><strong>TTL</strong></h2>
    <div class="clearfix"></div>
</div>
<div class="x_content">
    <?php echo $data['profile']['ttl'] ?> <br/>
</div>
<div class="x_title">
    <div class="clearfix"></div>
</div>

<div class="x_title">
    <h2><strong>Description</strong></h2>
    <div class="clearfix"></div>
</div>
<div class="x_content">
    <?php echo $data['profile']['deskripsi'] ?> <br/>
</div>
<div class="x_title">
    <div class="clearfix"></div>
</div>
</div>

<!-- <div class="col-md-12 col-sm-12 col-xs-12"> -->
  <div class="x_panel">
    <div class="x_title">
        <h2><strong>Project History</strong></h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">

      <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
          <thead>
            <tr class="headings">
              <th class="column-title">Project ID</th>
              <th class="column-title">Project Name</th>
              <th class="column-title">Project Budget</th>
              <th class="column-title">Your Bid</th>
              <th class="column-title">Status</th>
            </tr>
          </thead>

          <tbody>
            <?php
            if (!isset($data['project-list']) || sizeof($data['project-list']) <= 0) {
              echo "<tr class='even pointer'>
                                      <td colspan='5'>No Project</td>
                                    </tr>";
            } else {
              $counter = "even pointer";
              foreach ($data['project-list'] as $datalaporan) {
                $status = ($datalaporan['bid_status'] == 0 ? 'belum diterima':'diterima');
                echo "<tr class=$counter>
                        <td>$datalaporan[project_id]</td>
                        <td>
                        <a href=" . base_url("mhs/projectdetail/$datalaporan[project_id]") . ">
                        $datalaporan[project_name]
                        </a>
                        </td>
                        <td>$datalaporan[budget]</td>
                        <td>$datalaporan[bid_value]</td>
                        <td>$status</td>
                    </tr>";
                if ($counter == "even pointer") $counter = "odd pointer";
                else $counter = "even pointer";
              }
            }
            ?>

          </tbody>
        </table>
      </div>

    </div>
  </div>
<!-- </div> -->

