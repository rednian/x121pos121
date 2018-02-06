<section id="content" class="content">
  <div class="pull-right">

  </div>
  <h1 class="page-header">About Us
    <small>Website Setting</small>
  </h1>
  <!-- end page-header -->

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i
                class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i
                class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i
                class="fa fa-times"></i></a>
          </div>
          <h4 class="panel-title"></h4>
        </div>
        <div class="panel-body">
         <div>

           <!-- Nav tabs -->
           <ul class="nav nav-tabs" role="tablist">
             <li role="presentation"  class="active"><a href="#messages" aria-controls="messages" role="tab"
                                                        data-toggle="tab">Our Products</a></li>
             <li role="presentation"><a href="#services" aria-controls="services" role="tab"
                                        data-toggle="tab">Our Services</a></li>
             <li role="presentation"><a href="#tab-team" aria-controls="settings" role="tab"
                                        data-toggle="tab">Our Team</a></li>
             <li role="presentation"><a href="#ValuedCustomers" aria-controls="ValuedCustomers" role="tab"
                                        data-toggle="tab">Our Valued Customers</a></li>
             <li role="presentation"><a href="#TheProprietor" aria-controls="TheProprietor" role="tab"
                                        data-toggle="tab">The Proprietor</a></li>
             <li role="presentation"><a href="#contact-us" aria-controls="contact-us" role="tab"
                                       data-toggle="tab">Client Feedback</a></li>
           </ul>
           
            <!-- Tab panes -->
           <div class="tab-content">
             <div role="tabpanel" class="tab-pane fade in active" id="messages">
               <?php $this->load->view('web_setting/include/about/product-tab'); ?>
             </div>
             <div role="tabpanel" class="tab-pane" id="services">
               <?php $this->load->view('web_setting/include/about/services-tab'); ?>
             </div>
             <div role="tabpanel" class="tab-pane" id="tab-team">
               <?php $this->load->view('web_setting/include/about/team-tab'); ?>
             </div>
             <div role="tabpanel" class="tab-pane" id="ValuedCustomers">
               <?php $this->load->view('web_setting/include/about/customer-tab'); ?>
             </div>
             <div role="tabpanel" class="tab-pane" id="TheProprietor">
               <?php $this->load->view('web_setting/include/about/proprietor-tab'); ?>
             </div>
             <div role="tabpanel" class="tab-pane" id="contact-us">
                <?php $this->load->view('web_setting/include/about/contact-us-tab'); ?>
              </div>
             </div>
           </div>
        </div>
      </div>
    </div>
  </div>
</section>
