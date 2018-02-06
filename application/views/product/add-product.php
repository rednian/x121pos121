<div class="right_col" role="main">
<section class="row">
<div class="col-md-12">
<div class="x_panel">
<div class="x_title">
  <h2> Product
    <small>Information</small>
  </h2>
  <ul class="nav navbar-right panel_toolbox">
    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
    </li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
          class="fa fa-wrench"></i></a>
      <ul class="dropdown-menu" role="menu">
        <li><a href="#">Settings 1</a>
        </li>
        <li><a href="#">Settings 2</a>
        </li>
      </ul>
    </li>
    <li><a class="close-link"><i class="fa fa-close"></i></a>
    </li>
  </ul>
  <div class="clearfix"></div>
</div>
<div class="x_content">

<div class="" role="tabpanel" data-example-id="togglable-tabs">
<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
  <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab"
      aria-expanded="true">Add New Product</a>
  </li>
  <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab"
      aria-expanded="false"></a>
  </li>
  <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab"
      aria-expanded="false">Profile</a>
  </li>
</ul>
<div id="myTabContent" class="tab-content">
<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
  <section class="row">
    <div class="col-md-8">
      <div class="x_panel">
        <div class="x_title">

          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                aria-expanded="false"><i
                  class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Settings 1</a>
                </li>
                <li><a href="#">Settings 2</a>
                </li>
              </ul>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <section class="panel panel-default">
            <div class="panel-heading">
              <h1 class="panel-title">Product details</h1>
            </div>
            <div class="panel-body">
              <section class="row">
                <?php $attribute = array('class' => 'form-horizontal' , 'id' => 'frm-add-product'); ?>
                <?php echo form_open('' , $attribute); ?>
                <div class="col-md-8">
                  <div class="form-group">
                    <label for="barcode" class="col-sm-4 control-label">Barcode *</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="barcode" name="barcode" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="name" class="col-sm-4 control-label">Name *</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="name" name="name" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="name" class="col-sm-4 control-label">Subname </label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="name" name="name" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="name" class="col-sm-4 control-label">Packaging Type</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="name" name="name" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="name" class="col-sm-4 control-label">Quantity *</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="name" name="name" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                      <button type="submit" class="btn btn-dark">Submit</button>
                      <button type="submit" class="btn btn-danger">Reset</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <article class="media event">
                    <div class="media-body">

                    </div>
                  </article>
                </div>
                <?php echo form_close(); ?>
              </section>

            </div>
          </section>
        </div>
      </div>

    </div>
    <div class="col-md-4">
      <div class="x_panel">
        <div class="x_title">
          <h2>Recently Added
            <small>product</small>
          </h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                aria-expanded="false"><i
                  class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Settings 1</a>
                </li>
                <li><a href="#">Settings 2</a>
                </li>
              </ul>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <article class="media event">
            <a class="pull-left date">
              <p class="month">April</p>

              <p class="day">23</p>
            </a>

            <div class="media-body">
              <a class="title" href="#">Item One Tittle</a>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                <button class="btn btn-dark btn-xs">view more</button>
                <button class="btn btn-warning btn-xs">update</button>
              </p>
            </div>
          </article>
          <article class="media event">
            <a class="pull-left date">
              <p class="month">April</p>

              <p class="day">23</p>
            </a>

            <div class="media-body">
              <a class="title" href="#">Item Two Tittle</a>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                <button class="btn btn-dark btn-xs">view more</button>
                <button class="btn btn-warning btn-xs">update</button>
              </p>
            </div>
          </article>
          <article class="media event">
            <a class="pull-left date">
              <p class="month">April</p>

              <p class="day">23</p>
            </a>

            <div class="media-body">
              <a class="title" href="#">Item Two Tittle</a>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                <button class="btn btn-dark btn-xs">view more</button>
                <button class="btn btn-warning btn-xs">update</button>
              </p>
            </div>
          </article>
          <article class="media event">
            <a class="pull-left date">
              <p class="month">April</p>

              <p class="day">23</p>
            </a>

            <div class="media-body">
              <a class="title" href="#">Item Two Tittle</a>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                <button class="btn btn-dark btn-xs">view more</button>
                <button class="btn btn-warning btn-xs">update</button>
              </p>
            </div>
          </article>
          <article class="media event">
            <a class="pull-left date">
              <p class="month">April</p>

              <p class="day">23</p>
            </a>

            <div class="media-body">
              <a class="title" href="#">Item Three Tittle</a>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                <button class="btn btn-dark btn-xs">view more</button>
                <button class="btn btn-warning btn-xs">update</button>
              </p>
            </div>
          </article>
        </div>
      </div>
    </div>
  </section>
</div>
<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
<div class="x_panel">
<div class="x_title">
  <h2>Daily active users
    <small>Sessions</small>
  </h2>
  <ul class="nav navbar-right panel_toolbox">
    <li><a href="#"><i class="fa fa-chevron-up"></i></a>
    </li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
        aria-expanded="false"><i class="fa fa-wrench"></i></a>
      <ul class="dropdown-menu" role="menu">
        <li><a href="#">Settings 1</a>
        </li>
        <li><a href="#">Settings 2</a>
        </li>
      </ul>
    </li>
    <li><a href="#"><i class="fa fa-close"></i></a>
    </li>
  </ul>
  <div class="clearfix"></div>
</div>
<div class="x_content">
<table id="example" class="table table-striped responsive-utilities jambo_table">
<thead>
<tr class="headings">
  <th>
    <input type="checkbox" class="tableflat">
  </th>
  <th>Invoice</th>
  <th>Invoice Date</th>
  <th>Order</th>
  <th>Bill to Name</th>
  <th>Status</th>
  <th>Amount</th>
  <th class=" no-link last"><span class="nobr">Action</span>
  </th>
</tr>
</thead>

<tbody>
<tr class="even pointer">
  <td class="a-center ">
    <input type="checkbox" class="tableflat">
  </td>
  <td class=" ">121000040</td>
  <td class=" ">May 23, 2014 11:47:56 PM</td>
  <td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i>
  </td>
  <td class=" ">John Blank L</td>
  <td class=" ">Paid</td>
  <td class="a-right a-right ">$7.45</td>
  <td class=" last"><a href="#">View</a>
  </td>
</tr>
<tr class="odd pointer">
  <td class="a-center ">
    <input type="checkbox" class="tableflat">
  </td>
  <td class=" ">121000039</td>
  <td class=" ">May 23, 2014 11:30:12 PM</td>
  <td class=" ">121000208 <i class="success fa fa-long-arrow-up"></i>
  </td>
  <td class=" ">John Blank L</td>
  <td class=" ">Paid</td>
  <td class="a-right a-right ">$741.20</td>
  <td class=" last"><a href="#">View</a>
  </td>
</tr>
<tr class="even pointer selected">
  <td class="a-center ">
    <input type="checkbox" checked class="tableflat">
  </td>
  <td class=" ">121000038</td>
  <td class=" ">May 24, 2014 10:55:33 PM</td>
  <td class=" ">121000203 <i class="success fa fa-long-arrow-up"></i>
  </td>
  <td class=" ">Mike Smith</td>
  <td class=" ">Paid</td>
  <td class="a-right a-right ">$432.26</td>
  <td class=" last"><a href="#">View</a>
  </td>
</tr>
<tr class="odd pointer">
  <td class="a-center ">
    <input type="checkbox" class="tableflat">
  </td>
  <td class=" ">121000037</td>
  <td class=" ">May 24, 2014 10:52:44 PM</td>
  <td class=" ">121000204</td>
  <td class=" ">Mike Smith</td>
  <td class=" ">Paid</td>
  <td class="a-right a-right ">$333.21</td>
  <td class=" last"><a href="#">View</a>
  </td>
</tr>
<tr class="even pointer">
  <td class="a-center ">
    <input type="checkbox" class="tableflat">
  </td>
  <td class=" ">121000040</td>
  <td class=" ">May 24, 2014 11:47:56 PM</td>
  <td class=" ">121000210</td>
  <td class=" ">John Blank L</td>
  <td class=" ">Paid</td>
  <td class="a-right a-right ">$7.45</td>
  <td class=" last"><a href="#">View</a>
  </td>
</tr>
<tr class="odd pointer">
  <td class="a-center ">
    <input type="checkbox" class="tableflat">
  </td>
  <td class=" ">121000039</td>
  <td class=" ">May 26, 2014 11:30:12 PM</td>
  <td class=" ">121000208 <i class="error fa fa-long-arrow-down"></i>
  </td>
  <td class=" ">John Blank L</td>
  <td class=" ">Paid</td>
  <td class="a-right a-right ">$741.20</td>
  <td class=" last"><a href="#">View</a>
  </td>
</tr>
<tr class="even pointer">
  <td class="a-center ">
    <input type="checkbox" class="tableflat">
  </td>
  <td class=" ">121000038</td>
  <td class=" ">May 26, 2014 10:55:33 PM</td>
  <td class=" ">121000203</td>
  <td class=" ">Mike Smith</td>
  <td class=" ">Paid</td>
  <td class="a-right a-right ">$432.26</td>
  <td class=" last"><a href="#">View</a>
  </td>
</tr>
<tr class="odd pointer">
  <td class="a-center ">
    <input type="checkbox" class="tableflat">
  </td>
  <td class=" ">121000037</td>
  <td class=" ">May 26, 2014 10:52:44 PM</td>
  <td class=" ">121000204</td>
  <td class=" ">Mike Smith</td>
  <td class=" ">Paid</td>
  <td class="a-right a-right ">$333.21</td>
  <td class=" last"><a href="#">View</a>
  </td>
</tr>

<tr class="even pointer">
  <td class="a-center ">
    <input type="checkbox" class="tableflat">
  </td>
  <td class=" ">121000040</td>
  <td class=" ">May 27, 2014 11:47:56 PM</td>
  <td class=" ">121000210</td>
  <td class=" ">John Blank L</td>
  <td class=" ">Paid</td>
  <td class="a-right a-right ">$7.45</td>
  <td class=" last"><a href="#">View</a>
  </td>
</tr>
<tr class="odd pointer">
  <td class="a-center ">
    <input type="checkbox" class="tableflat">
  </td>
  <td class=" ">121000039</td>
  <td class=" ">May 28, 2014 11:30:12 PM</td>
  <td class=" ">121000208</td>
  <td class=" ">John Blank L</td>
  <td class=" ">Paid</td>
  <td class="a-right a-right ">$741.20</td>
  <td class=" last"><a href="#">View</a>
  </td>
</tr>
<tr class="even pointer">
  <td class="a-center ">
    <input type="checkbox" class="tableflat">
  </td>
  <td class=" ">121000040</td>
  <td class=" ">May 23, 2014 11:47:56 PM</td>
  <td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i>
  </td>
  <td class=" ">John Blank L</td>
  <td class=" ">Paid</td>
  <td class="a-right a-right ">$7.45</td>
  <td class=" last"><a href="#">View</a>
  </td>
</tr>
<tr class="odd pointer">
  <td class="a-center ">
    <input type="checkbox" class="tableflat">
  </td>
  <td class=" ">121000039</td>
  <td class=" ">May 23, 2014 11:30:12 PM</td>
  <td class=" ">121000208 <i class="success fa fa-long-arrow-up"></i>
  </td>
  <td class=" ">John Blank L</td>
  <td class=" ">Paid</td>
  <td class="a-right a-right ">$741.20</td>
  <td class=" last"><a href="#">View</a>
  </td>
</tr>
<tr class="even pointer selected">
  <td class="a-center ">
    <input type="checkbox" checked class="tableflat">
  </td>
  <td class=" ">121000038</td>
  <td class=" ">May 24, 2014 10:55:33 PM</td>
  <td class=" ">121000203 <i class="success fa fa-long-arrow-up"></i>
  </td>
  <td class=" ">Mike Smith</td>
  <td class=" ">Paid</td>
  <td class="a-right a-right ">$432.26</td>
  <td class=" last"><a href="#">View</a>
  </td>
</tr>
<tr class="odd pointer">
  <td class="a-center ">
    <input type="checkbox" class="tableflat">
  </td>
  <td class=" ">121000037</td>
  <td class=" ">May 24, 2014 10:52:44 PM</td>
  <td class=" ">121000204</td>
  <td class=" ">Mike Smith</td>
  <td class=" ">Paid</td>
  <td class="a-right a-right ">$333.21</td>
  <td class=" last"><a href="#">View</a>
  </td>
</tr>
<tr class="even pointer">
  <td class="a-center ">
    <input type="checkbox" class="tableflat">
  </td>
  <td class=" ">121000040</td>
  <td class=" ">May 24, 2014 11:47:56 PM</td>
  <td class=" ">121000210</td>
  <td class=" ">John Blank L</td>
  <td class=" ">Paid</td>
  <td class="a-right a-right ">$7.45</td>
  <td class=" last"><a href="#">View</a>
  </td>
</tr>
<tr class="odd pointer">
  <td class="a-center ">
    <input type="checkbox" class="tableflat">
  </td>
  <td class=" ">121000039</td>
  <td class=" ">May 26, 2014 11:30:12 PM</td>
  <td class=" ">121000208 <i class="error fa fa-long-arrow-down"></i>
  </td>
  <td class=" ">John Blank L</td>
  <td class=" ">Paid</td>
  <td class="a-right a-right ">$741.20</td>
  <td class=" last"><a href="#">View</a>
  </td>
</tr>
<tr class="even pointer">
  <td class="a-center ">
    <input type="checkbox" class="tableflat">
  </td>
  <td class=" ">121000038</td>
  <td class=" ">May 26, 2014 10:55:33 PM</td>
  <td class=" ">121000203</td>
  <td class=" ">Mike Smith</td>
  <td class=" ">Paid</td>
  <td class="a-right a-right ">$432.26</td>
  <td class=" last"><a href="#">View</a>
  </td>
</tr>
<tr class="odd pointer">
  <td class="a-center ">
    <input type="checkbox" class="tableflat">
  </td>
  <td class=" ">121000037</td>
  <td class=" ">May 26, 2014 10:52:44 PM</td>
  <td class=" ">121000204</td>
  <td class=" ">Mike Smith</td>
  <td class=" ">Paid</td>
  <td class="a-right a-right ">$333.21</td>
  <td class=" last"><a href="#">View</a>
  </td>
</tr>

<tr class="even pointer">
  <td class="a-center ">
    <input type="checkbox" class="tableflat">
  </td>
  <td class=" ">121000040</td>
  <td class=" ">May 27, 2014 11:47:56 PM</td>
  <td class=" ">121000210</td>
  <td class=" ">John Blank L</td>
  <td class=" ">Paid</td>
  <td class="a-right a-right ">$7.45</td>
  <td class=" last"><a href="#">View</a>
  </td>
</tr>
<tr class="odd pointer">
  <td class="a-center ">
    <input type="checkbox" class="tableflat">
  </td>
  <td class=" ">121000039</td>
  <td class=" ">May 28, 2014 11:30:12 PM</td>
  <td class=" ">121000208</td>
  <td class=" ">John Blank L</td>
  <td class=" ">Paid</td>
  <td class="a-right a-right ">$741.20</td>
  <td class=" last"><a href="#">View</a>
  </td>
</tr>
<tr class="even pointer">
  <td class="a-center ">
    <input type="checkbox" class="tableflat">
  </td>
  <td class=" ">121000040</td>
  <td class=" ">May 23, 2014 11:47:56 PM</td>
  <td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i>
  </td>
  <td class=" ">John Blank L</td>
  <td class=" ">Paid</td>
  <td class="a-right a-right ">$7.45</td>
  <td class=" last"><a href="#">View</a>
  </td>
</tr>
<tr class="odd pointer">
  <td class="a-center ">
    <input type="checkbox" class="tableflat">
  </td>
  <td class=" ">121000039</td>
  <td class=" ">May 23, 2014 11:30:12 PM</td>
  <td class=" ">121000208 <i class="success fa fa-long-arrow-up"></i>
  </td>
  <td class=" ">John Blank L</td>
  <td class=" ">Paid</td>
  <td class="a-right a-right ">$741.20</td>
  <td class=" last"><a href="#">View</a>
  </td>
</tr>
<tr class="even pointer selected">
  <td class="a-center ">
    <input type="checkbox" checked class="tableflat">
  </td>
  <td class=" ">121000038</td>
  <td class=" ">May 24, 2014 10:55:33 PM</td>
  <td class=" ">121000203 <i class="success fa fa-long-arrow-up"></i>
  </td>
  <td class=" ">Mike Smith</td>
  <td class=" ">Paid</td>
  <td class="a-right a-right ">$432.26</td>
  <td class=" last"><a href="#">View</a>
  </td>
</tr>
<tr class="odd pointer">
  <td class="a-center ">
    <input type="checkbox" class="tableflat">
  </td>
  <td class=" ">121000037</td>
  <td class=" ">May 24, 2014 10:52:44 PM</td>
  <td class=" ">121000204</td>
  <td class=" ">Mike Smith</td>
  <td class=" ">Paid</td>
  <td class="a-right a-right ">$333.21</td>
  <td class=" last"><a href="#">View</a>
  </td>
</tr>
<tr class="even pointer">
  <td class="a-center ">
    <input type="checkbox" class="tableflat">
  </td>
  <td class=" ">121000040</td>
  <td class=" ">May 24, 2014 11:47:56 PM</td>
  <td class=" ">121000210</td>
  <td class=" ">John Blank L</td>
  <td class=" ">Paid</td>
  <td class="a-right a-right ">$7.45</td>
  <td class=" last"><a href="#">View</a>
  </td>
</tr>
<tr class="odd pointer">
  <td class="a-center ">
    <input type="checkbox" class="tableflat">
  </td>
  <td class=" ">121000039</td>
  <td class=" ">May 26, 2014 11:30:12 PM</td>
  <td class=" ">121000208 <i class="error fa fa-long-arrow-down"></i>
  </td>
  <td class=" ">John Blank L</td>
  <td class=" ">Paid</td>
  <td class="a-right a-right ">$741.20</td>
  <td class=" last"><a href="#">View</a>
  </td>
</tr>
<tr class="even pointer">
  <td class="a-center ">
    <input type="checkbox" class="tableflat">
  </td>
  <td class=" ">121000038</td>
  <td class=" ">May 26, 2014 10:55:33 PM</td>
  <td class=" ">121000203</td>
  <td class=" ">Mike Smith</td>
  <td class=" ">Paid</td>
  <td class="a-right a-right ">$432.26</td>
  <td class=" last"><a href="#">View</a>
  </td>
</tr>
<tr class="odd pointer">
  <td class="a-center ">
    <input type="checkbox" class="tableflat">
  </td>
  <td class=" ">121000037</td>
  <td class=" ">May 26, 2014 10:52:44 PM</td>
  <td class=" ">121000204</td>
  <td class=" ">Mike Smith</td>
  <td class=" ">Paid</td>
  <td class="a-right a-right ">$333.21</td>
  <td class=" last"><a href="#">View</a>
  </td>
</tr>

<tr class="even pointer">
  <td class="a-center ">
    <input type="checkbox" class="tableflat">
  </td>
  <td class=" ">121000040</td>
  <td class=" ">May 27, 2014 11:47:56 PM</td>
  <td class=" ">121000210</td>
  <td class=" ">John Blank L</td>
  <td class=" ">Paid</td>
  <td class="a-right a-right ">$7.45</td>
  <td class=" last"><a href="#">View</a>
  </td>
</tr>
<tr class="odd pointer">
  <td class="a-center ">
    <input type="checkbox" class="tableflat">
  </td>
  <td class=" ">121000039</td>
  <td class=" ">May 28, 2014 11:30:12 PM</td>
  <td class=" ">121000208</td>
  <td class=" ">John Blank L</td>
  <td class=" ">Paid</td>
  <td class="a-right a-right ">$741.20</td>
  <td class=" last"><a href="#">View</a>
  </td>
</tr>
<tr class="even pointer">
  <td class="a-center ">
    <input type="checkbox" class="tableflat">
  </td>
  <td class=" ">121000040</td>
  <td class=" ">May 23, 2014 11:47:56 PM</td>
  <td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i>
  </td>
  <td class=" ">John Blank L</td>
  <td class=" ">Paid</td>
  <td class="a-right a-right ">$7.45</td>
  <td class=" last"><a href="#">View</a>
  </td>
</tr>
<tr class="odd pointer">
  <td class="a-center ">
    <input type="checkbox" class="tableflat">
  </td>
  <td class=" ">121000039</td>
  <td class=" ">May 23, 2014 11:30:12 PM</td>
  <td class=" ">121000208 <i class="success fa fa-long-arrow-up"></i>
  </td>
  <td class=" ">John Blank L</td>
  <td class=" ">Paid</td>
  <td class="a-right a-right ">$741.20</td>
  <td class=" last"><a href="#">View</a>
  </td>
</tr>
<tr class="even pointer selected">
  <td class="a-center ">
    <input type="checkbox" checked class="tableflat">
  </td>
  <td class=" ">121000038</td>
  <td class=" ">May 24, 2014 10:55:33 PM</td>
  <td class=" ">121000203 <i class="success fa fa-long-arrow-up"></i>
  </td>
  <td class=" ">Mike Smith</td>
  <td class=" ">Paid</td>
  <td class="a-right a-right ">$432.26</td>
  <td class=" last"><a href="#">View</a>
  </td>
</tr>
<tr class="odd pointer">
  <td class="a-center ">
    <input type="checkbox" class="tableflat">
  </td>
  <td class=" ">121000037</td>
  <td class=" ">May 24, 2014 10:52:44 PM</td>
  <td class=" ">121000204</td>
  <td class=" ">Mike Smith</td>
  <td class=" ">Paid</td>
  <td class="a-right a-right ">$333.21</td>
  <td class=" last"><a href="#">View</a>
  </td>
</tr>
<tr class="even pointer">
  <td class="a-center ">
    <input type="checkbox" class="tableflat">
  </td>
  <td class=" ">121000040</td>
  <td class=" ">May 24, 2014 11:47:56 PM</td>
  <td class=" ">121000210</td>
  <td class=" ">John Blank L</td>
  <td class=" ">Paid</td>
  <td class="a-right a-right ">$7.45</td>
  <td class=" last"><a href="#">View</a>
  </td>
</tr>
<tr class="odd pointer">
  <td class="a-center ">
    <input type="checkbox" class="tableflat">
  </td>
  <td class=" ">121000039</td>
  <td class=" ">May 26, 2014 11:30:12 PM</td>
  <td class=" ">121000208 <i class="error fa fa-long-arrow-down"></i>
  </td>
  <td class=" ">John Blank L</td>
  <td class=" ">Paid</td>
  <td class="a-right a-right ">$741.20</td>
  <td class=" last"><a href="#">View</a>
  </td>
</tr>
<tr class="even pointer">
  <td class="a-center ">
    <input type="checkbox" class="tableflat">
  </td>
  <td class=" ">121000038</td>
  <td class=" ">May 26, 2014 10:55:33 PM</td>
  <td class=" ">121000203</td>
  <td class=" ">Mike Smith</td>
  <td class=" ">Paid</td>
  <td class="a-right a-right ">$432.26</td>
  <td class=" last"><a href="#">View</a>
  </td>
</tr>
<tr class="odd pointer">
  <td class="a-center ">
    <input type="checkbox" class="tableflat">
  </td>
  <td class=" ">121000037</td>
  <td class=" ">May 26, 2014 10:52:44 PM</td>
  <td class=" ">121000204</td>
  <td class=" ">Mike Smith</td>
  <td class=" ">Paid</td>
  <td class="a-right a-right ">$333.21</td>
  <td class=" last"><a href="#">View</a>
  </td>
</tr>

<tr class="even pointer">
  <td class="a-center ">
    <input type="checkbox" class="tableflat">
  </td>
  <td class=" ">121000040</td>
  <td class=" ">May 27, 2014 11:47:56 PM</td>
  <td class=" ">121000210</td>
  <td class=" ">John Blank L</td>
  <td class=" ">Paid</td>
  <td class="a-right a-right ">$7.45</td>
  <td class=" last"><a href="#">View</a>
  </td>
</tr>
<tr class="odd pointer">
  <td class="a-center ">
    <input type="checkbox" class="tableflat">
  </td>
  <td class=" ">121000039</td>
  <td class=" ">May 28, 2014 11:30:12 PM</td>
  <td class=" ">121000208</td>
  <td class=" ">John Blank L</td>
  <td class=" ">Paid</td>
  <td class="a-right a-right ">$741.20</td>
  <td class=" last"><a href="#">View</a>
  </td>
</tr>
</tbody>

</table>
</div>
</div>
</div>
<div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
  <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.
    Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko
    farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk </p>
</div>
</div>
</div>

</div>
</div>
</div>
</section>
</div>