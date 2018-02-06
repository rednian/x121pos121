<!-- Modal -->
<div class="modal fade" id="update-user-dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Update User Account</h4>
      </div>
      <div class="modal-body">
      
        <form method="post" action="<?php echo base_url('user_account/update_user') ?>" id="frm-user-update">
          <section class="row">
            <div class="col-sm-3">
              <section class="panel panel-info">
                <div class="panel-heading">
                  <h4 class="panel-title">Account Details</h4>
                </div>
                <div class="panel-body">
                  <div class="form-group">
                    <label>First name</label>
                    <input type="text" class="form-control input-sm" autocomplete="off" autofocus="" name="fname" id="fname"/>
                  </div>
                  <div class="form-group">
                    <label>Middle name</label>
                    <input type="text" class="form-control input-sm" autocomplete="off" name="midname" id="midname"/>
                  </div>
                  <div class="form-group">
                    <label>Last name</label>
                    <input type="text" class="form-control input-sm" autocomplete="off" name="lastname" id="lastname"/>
                    <input type="hidden" name="id" id="data-id"/>
                    <input type="hidden" name="pos_id" id="pos-data-id"/>
                  </div>
                  <div class="form-group">
                    <label>Positon</label>
                    <select id="position" name="position" class="form-control input-sm">
                      <option disabled> Choose Position</option>
                    </select>
                  </div>
                </div>
              </section>
         
            </div>
            <div class="col-sm-9">
              <section class="row">
                <div class="panel panel-info">
                  <div class="panel-heading">
                    <h4 class="panel-title">Account Accessibility</h4>
                  </div>
                  <div class="panel-body">
                    <section class="row">
                      <div class="col-sm-4">
                        <section class="panel panel-success">
                          <div class="panel-heading">
                            <h4 class="panel-title">Profile</h4>
                          </div>
                          <div class="panel-body">
                            <div class="form-group">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" name="accessibility[]" value="2"> Account
                                </label>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" name="accessibility[]" value="3"> Product
                                </label>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" name="accessibility[]" value="4"> Service
                                </label>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" name="accessibility[]" value="5"> Artist
                                </label>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" name="accessibility[]" value="6"> Company
                                </label>
                              </div>
                            </div>
                            <!-- <div class="form-group">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" name="accessibility[]" value="6"> Artist
                                </label>
                              </div>
                            </div> -->
                          </div>
                        </section>
                      </div>
                      <div class="col-sm-4">
                        <section class="panel panel-success">
                          <div class="panel-heading">
                            <h4 class="panel-title">Reward</h4>
                          </div>
                          <div class="panel-body">

                            <div class="form-group">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" name="accessibility[]" value="7"> Pointing System  
                                </label>
                              </div>
                            </div>

                          </div>
                        </section>
                      </div>
                      <div class="col-sm-4">
                        <section class="panel panel-success">
                          <div class="panel-heading">
                            <h4 class="panel-title">Reports</h4>
                          </div>
                          <div class="panel-body">

                           <div class="form-group">
                             <div class="checkbox">
                               <label>
                                 <input type="checkbox" name="accessibility[]" value="8"> Inventory  
                               </label>
                             </div>
                           </div>

                           <div class="form-group">
                             <div class="checkbox">
                               <label>
                                 <input type="checkbox" name="accessibility[]" value="9"> Sales  
                               </label>
                             </div>
                           </div>

                           <div class="form-group">
                             <div class="checkbox">
                               <label>
                                 <input type="checkbox" name="accessibility[]" value="10"> Sales  
                               </label>
                             </div>
                           </div>

                          </div>
                        </section>
                      </div>
                    </section>
                    <section class="row">
                      <!-- <div class="col-sm-4">
                        <section class="panel panel-success">
                          <div class="panel-heading">
                            <h4 class="panel-title">Web Settings</h4>
                          </div>
                          <div class="panel-body">

                          <div class="form-group">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="accessibility[]" value="12"> About Us  
                              </label>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="accessibility[]" value="13"> Products  
                              </label>
                            </div>
                          </div>


                          <div class="form-group">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="accessibility[]" value="14"> Services  
                              </label>
                            </div>
                          </div>


                          </div>
                        </section>
                      </div> -->
                      <div class="col-sm-4">
                        <section class="panel panel-success">
                          <div class="panel-heading">
                            <h4 class="panel-title">Sell</h4>
                          </div>
                          <div class="panel-body">

                      
                          <div class="form-group">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="accessibility[]" value="1"> Common
                              </label>
                            </div>
                          </div>

                          </div>
                        </section>
                      </div>
                    </section>
                  </div>
                </div>
              </section>
              </div>


          

            </div>
        
               

   
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm " data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success btn-sm ">Save changes</button>
         </form>
      </div>
    </div>
  </div>
</div> 