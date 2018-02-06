<div class="modal fade" id="add-card-holder-dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Register Card Holder</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('reward/add_card_holder');?>" method="post" id="frm-card-holder"
          enctype="multipart/form-data">
          <section class="row">
            <div class="col-sm-6">

              <section class="panel panel-success">
                <div class="panel-heading">
                  <h4 class="panel-title">Card Detail</h4>
                </div>
                <div class="panel-body">
                  <div class="form-group">
                    <input type="text" name="card_number" id="" class="form-control input-sm" autocomplete="off"
                      autofocus="" placeholder="Card Number"/>
                  </div>
                </div>
              </section>

              <section class="panel panel-success">
                <div class="panel-heading">
                  <h4 class="panel-title">Personal Details</h4>
                </div>
                <div class="panel-body">
                    
                  <div class="form-group">
                    <input type="text" name="fname" id="" class="form-control input-sm" autocomplete="off"
                      autofocus="" placeholder="First Name"/>
                    <input name="cus_id" type="hidden" id="cus-id">
                  </div>
                  <div class="form-group">
                    <input type="text" name="lastname" id="" class="form-control input-sm" autocomplete="off"
                      autofocus="" placeholder="Last Name"/>
                  </div>
                  <div class="form-group">
                    <input type="text" name="contact" id="" class="form-control input-sm" autocomplete="off"
                      autofocus="" placeholder="contact Number"/>
                  </div>
                  <div class="form-group">
                    <input type="file" name="image" id="" class="form-control input-sm" autocomplete="off"
                      autofocus=""/>
                  </div>
              </section>


            </div>
            <div class="col-sm-6">
              <section class="panel panel-success">
                <div class="panel-heading">
                  <h4 class="panel-title">Addition Details</h4>
                </div>
                <div class="panel-body">
                  
                  <div class="form-group">
                    <section class="row">
                      <div class="col-sm-6">
                        <input type="text" name="lot" id="" class="form-control input-sm" autocomplete="off"
                          autofocus="" placeholder="lot #"/>
                      </div>
                      <div class="col-sm-6">
                        <input type="text" name="block" id="" class="form-control input-sm" autocomplete="off"
                          autofocus="" placeholder="block #"/>
                      </div>
                    </section>
                  </div>
                  <div class="form-group">
                    <input type="text" name="street_name" id="" class="form-control input-sm" autocomplete="off"
                      autofocus="" placeholder="Street Name"/>
                  </div>
                  <div class="form-group">
                    <input type="text" name="barangay" id="" class="form-control input-sm" autocomplete="off"
                      autofocus="" placeholder="Barangay"/>
                  </div>
                  <div class="form-group">
                    <input type="text" name="city" id="" class="form-control input-sm" autocomplete="off"
                      autofocus="" placeholder="City"/>
                  </div>
                  <div class="form-group">
                    <input type="text" name="province" id="" class="form-control input-sm" autocomplete="off"
                      autofocus="" placeholder="Province"/>
                  </div>
                  <div class="form-group">
                    <input type="text" name="zip_code" id="" class="form-control input-sm" autocomplete="off"
                      autofocus="" placeholder="Postal Code"/>
                  </div>
                  <div class="form-group">
                    <input type="text" name="country" id="" class="form-control input-sm" autocomplete="off"
                      autofocus="" placeholder="Country"/>
                  </div>

                </div>
              </section>
            </div>
          </section>
       

      </div>
      <div class="modal-footer">
        <button class="btn btn-sm btn-dafault" data-dismiss="modal" type="button">Close</button>
        <button class="btn btn-sm btn-danger" type="reset">Cancel</button>
        <input class="btn btn-success btn-sm" id="btn-add-card-holder" type="submit" name="submit" value="Save">
      </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function () {
    
    // $('#btn-add-card-holder').click(function(){
    //    var $btn = $(this).button('loading');
    // });

  });
</script>