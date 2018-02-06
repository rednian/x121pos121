<section class="row" style="margin-top: 3%">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <h3>The Proprietor</h3>
    <section class="row">
      <div class="col-md-5 col-sm-5 col-xs-12">
        <section class="panel">
          <div class="panel-body">
            <div class="div-header">
              <h5>Propritor Image</h5>
            </div>
            <img src="" id="image-prop" alt="" class="img-container img-responsive img-thumbnail"/>
          </div>
        </section>
      </div>
      <div class="col-md-7 col-sm-7 col-xs-12">
        <section class="panel" id="prop">
          <div class="panel-body">
            <div class="div-header">
              <h5>Proprietor Desciption</h5>
            </div>
            <p class="description" style="text-align: justify"></p>

            <p>last updated <strong id="date"></strong>
              <button id="btn-prop-update" type="submit" class=" id btn btn-default btn-sm" data-id="">
                <span class="glyphicon glyphicon-pencil"></span>
              </button>
            </p>
          </div>
        </section>
        <section class="panel hide" id="prop-update">
          <div class="panel-body">
            <div class="div-header">
              <h5>Update Proprietor Desciption</h5>
            </div>
            <form class="form-horizontal" id="frm-prop" method="post" action="<?php echo base_url('web_setting/update_prop'); ?>">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 col-xs-12 col-md-2  control-label">Image</label>

                <div class="col-sm-10 col-xs-12 col-md-10">
                  <input type="file" class="form-control" id="file" name="image">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-2  col-xs-12 col-md-2 control-label">Description</label>

                <div class="col-sm-10 col-xs-12 col-md-10">
                  <input name="id" type="hidden" id="hidden" value=""/>
                  <input name="ami_id" type="hidden" id="ami_id" value=""/>
                  <textarea style="font-family: 'Courier New', Courier, monospace; min-height:250px;max-height: 400px " name="description" id="frm-description" class=" description form-control"></textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2 col-xs-12 col-md-10">
                  <button id="btn-save-changes" type="submit" class="btn btn-success btn-sm">Save changes</button>
                  <button id="btn-close" type="reset" class="btn btn-default">Close</button>
                </div>
              </div>
            </form>
          </div>
        </section>
      </div>
    </section>
  </div>
</section>
<script>

  $(document).ready(function () {
    $('#frm-prop').formValidation({
      message: 'This value is not valid',
      //live: 'disabled',
      icon: {
//        valid: 'glyphicon glyphicon-ok',
//        invalid: 'glyphicon glyphicon-remove',
        validating: 'fa fa-refresh fa-spin'
      },
      fields: {

        description: {
          validators: {
            notEmpty: {
              message: 'The description is required and can\'t be empty'
            }
          }
        }

      }/*end of fields*/
    }).on('success.form.fv', function (e) {
      e.preventDefault();
      var $form = $(e.target);
      $.ajax({
        url: $(this).attr('action'),
        data: new FormData(this),
        type: 'POST',
        contentType: false,
        cache: false,
        processData: false,
        dataType: 'html',
        statusCode: {
          404: function() {
            alert( "page not found" );
          }
        },
        success: function (data) {
          if(data == 1 ){
            get_prop();
            new PNotify({
              type: "success",
              text: "Proprietor Successfully Updated.",
              nonblock: {
                nonblock: true
              },
              animate: {
                animate: true,
                in_class: 'slideInDown',
                out_class: 'slideOutUp'
              }
            });
            $('#prop-update').addClass('hide');
            $('#prop').removeClass('hide');
          }
          $form
            .formValidation('disableSubmitButtons', false)  // Enable the submit buttons
            .formValidation('resetForm', true);             // Reset the form

        }
      });
    });


    get_prop();
    $('#btn-close').click(function(){
      $('#prop-update').addClass('hide');
      $('#prop').removeClass('hide');
    });


    $('#btn-prop-update').click(function () {
      $('#prop-update').removeClass('hide');
      $('#prop').addClass('hide');
    });

  });


  function get_prop() {
    $.ajax({
      url: '<?php echo base_url('web_setting/get_prop');?>',
      dataType: 'JSON',
      success: function (data) {
        $.each(data, function (index, data) {
          $('.description').text(data.description);
          $('.description').val(data.description);
          $('.id').attr('data-id', data.id);
          $('#hidden').val(data.id);
          $('#ami_id').val(data.ami_id);
          $('#date').html(data.date);
          /*for image*/
          $('#image-prop').attr('src', data.image);
      
        });
      }
    });
  }
</script>