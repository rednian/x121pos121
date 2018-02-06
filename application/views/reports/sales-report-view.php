<section id="content" class="content">
  <!-- begin breadcrumb -->
  <!-- <ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Page Options</a></li>
    <li class="active">Blank Page</li>
  </ol> -->
  <!-- end breadcrumb -->
  <!-- begin page-header -->
  <h1 class="page-header"> Sales Reports</h1>
  <!-- end page-header -->
  
  <div class="row">
      <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    </div>
                    <div class="panel-body">
                      <div>

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                          <li role="presentation" class="active">
                            <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Product</a></li>
                          <li role="presentation">
                            <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Services</a></li>
                            <li role="presentation">
                              <a href="#package-tab" aria-controls="package-tab" role="tab" data-toggle="tab">Summary Reports</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                          <div role="tabpanel" class="tab-pane active" id="home">
                            <?php $this->load->view('reports/sales/products'); ?>
                          </div>
                          <div role="tabpanel" class="tab-pane" id="profile">
                            <?php $this->load->view('reports/sales/services'); ?>
                          </div>
                          <div role="tabpanel" class="tab-pane" id="package-tab">
                           <?php $this->load->view('reports/sales/package'); ?>
                          </div>
                        </div>

                      </div>
                    </div>
                </div>
      </div>
  </div>
</section>
