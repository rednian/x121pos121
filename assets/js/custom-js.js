var service_id = '';
var package_id = '';
var product_id = '';
var service_commission = '';


   function print_page(data) 
    {
        var mywindow = window.open('', 'my div', 'height=400,width=600');
        mywindow.document.write('<html><head><title>my div</title>');
        // /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();
        mywindow.close();

        return true;
    }

$(document).ready(function () {




  // autosize($('textarea'));

  // $('input.tableflat').iCheck({
  //   checkboxClass: 'icheckbox_flat-green',
  //   radioClass: 'iradio_flat-green'
  // });

  $(':reset').click(function () {

//        .formValidation('disableSubmitButtons', false)  // Enable the submit buttons
    $('form').formValidation('resetForm', true);
    $('form').data('formValidation').resetForm();


  });

});

function getLastWeek(){
  var today = new Date();
  var lastWeek = new Date(today.getFullYear(), today.getMonth(), today.getDate() - 7);
  return lastWeek ;
}


function clear_form(){
  $('form').formValidation('resetForm', true);
  $('form').data('formValidation').resetForm();
}

function getimagefile() {
  $(".view_image").fadeIn(1000).attr('src', URL.createObjectURL(event.target.files[0]));
}



Number.prototype.formatMoney = function(c, d, t){
  var n = this,
      c = isNaN(c = Math.abs(c)) ? 2 : c,
      d = d == undefined ? "." : d,
      t = t == undefined ? "," : t,
      s = n < 0 ? "-" : "",
      i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "",
      j = (j = i.length) > 3 ? j % 3 : 0;
  return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
};

