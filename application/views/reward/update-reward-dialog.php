<div class="modal fade" id="update-reward-dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Update Card Holder Details</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('reward/update_card_holder');?>" method="post" id="frm-update-card-holder" enctype="multipart/form-data">
          <section class="row">
            <div class="col-sm-6 col-xs-12">
              <!-- <section class="panel panel-success">
                <div class="panel-heading">
                  <h4 class="panel-title">Card Information</h4>
                </div>
                <div class="panel-body">
                  <div class="form-group">
                    <label>Card Number</label>
                    <input type="text" name="card_number" id="f-card-number" class="form-control input-sm" autocomplete="off"
                      autofocus="" placeholder="Card Number"/>
                  </div>
                </div>
              </section> -->
              <section class="panel panel-success">
                <div class="panel-heading">
                  <h4 class="panel-title">Personal Details</h4>
                </div>
                <div class="panel-body">
                  <div class="form-group">
                    <label>Firstname</label>
                    <input type="text" name="fname" id="f-fname" class="form-control input-sm" autocomplete="off"
                      autofocus="" placeholder="First Name"/>
                    <input name="cus_id" type="hidden" id="cus-id">
                  </div>
                  <div class="form-group">
                    <label>Lastname</label>
                    <input type="text" name="lastname" id="f-lastname" class="form-control input-sm" autocomplete="off"
                      autofocus="" placeholder="Last Name"/>
                  </div>  
                  <div class="form-group">
                    <label>Contact Number</label>
                    <input type="text" name="contact" id="f-contact" class="form-control input-sm" autocomplete="off"
                      autofocus="" placeholder="contact Number"/>
                       <input type="hidden" name="cus_id" id="f-cus-id"/>
                  </div>
                  <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" id="f-image" class="form-control input-sm" autocomplete="off"
                      autofocus=""/>
                  </div>
                </div>
              </section>
            </div>
            <div class="col-sm-6 col-xs-12">
              <section class="panel panel-success">
                <div class="panel-heading">
                  <h4 class="panel-title">Additional Information</h4>
                </div>
                <div class="panel-body">
                  <div class="form-group">
               <section class="row">
                 <div class="col-sm-6">
                  <label>Lot #</label>
                   <input type="text" name="lot" id="f-lot" class="form-control input-sm" autocomplete="off"
                     autofocus="" placeholder="lot #"/>
                 </div>
                 <div class="col-sm-6">
                 <label>Block #</label>
                   <input type="text" name="block" id="f-block" class="form-control input-sm" autocomplete="off"
                     autofocus="" placeholder="block #"/>
                 </div>
               </section>
             </div>
             <div class="form-group">
              <label>Street name</label>
               <input type="text" name="street_name" id="f-street-name" class="form-control input-sm" autocomplete="off"
                 autofocus="" placeholder="Street Name"/>
             </div>
             <div class="form-group">
              <label>Barangay</label>
               <input type="text" name="barangay" id="f-barangay" class="form-control input-sm" autocomplete="off"
                 autofocus="" placeholder="Barangay"/>
             </div>
             <div class="form-group">
              <label>City</label>
               <input type="text" name="city" id="f-city" class="form-control input-sm" autocomplete="off"
                 autofocus="" placeholder="City"/>
             </div>
             <div class="form-group">
              <label>Province</label>
               <input type="text" name="province" id="f-province" class="form-control input-sm" autocomplete="off"
                 autofocus="" placeholder="Province"/>
             </div>
             <div class="form-group">
              <label>Postal Code</label>
               <input type="text" name="zip_code" id="f-zip-code" class="form-control input-sm" autocomplete="off"
                 autofocus="" placeholder="Postal Code"/> 
             </div>
             <div class="form-group">
              <label>Country</label>
               <input type="text" name="country" id="f-country" class="form-control input-sm" autocomplete="off"/>
               <input type="hidden" name="ch_id" id="f-ch-id" />
               <input type="hidden" name="cus_id" id="f-c-id" />
             </div>
                </div>
              </section>
            </div>
          </section>


      </div>
      <div class="modal-footer">
        <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
        <button type="submit" class="btn btn-sm btn-success"><span class="glyphicon"></span> Save Changes</button>
         </form>
      </div>
    </div>
  </div>
</div>