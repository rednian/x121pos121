<section id="content" class="content">
  <div class="pull-right">

  </div>
  <h1 class="page-header"><?php echo $heading; ?></h1>
  <!-- end page-header -->

  <div class="row">
    <div class="col-sm-3">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title"><strong>Artist List</strong></h4>
        </div>
        <div class="panel-body">
     
          
       
         <!-- <table id="artist-list" class="table table-bordered table-sochic" style="margin-top: 5%;">
           <thead>
           <tr>
             <th class="col-sm-3">Artist</th>
             <!-- <th class="col-sm-3">Details</th> -->
           </tr>
           </thead>

         </table> 
         <div class="input-group">
           <select class="form-control input-sm" id="artist-list-select"></select>
           <span class="input-group-addon" style="border-radius: 0"><span class=" fa
           fa-user"></span></span>
         </div>
         <section class="form-group">
           <h5>Select Date</h5>

           <div class="input-group">
             <input id="package" type="text" class="form-control date-picker input-sm" aria-label="">
             <span class="input-group-addon" style="border-radius: 0"><span class=" fa
             fa-calendar"></span></span>
             <span id="btn-refresh" class="input-group-addon btn" style="border-radius: 0;"><span class=" fa
             fa-refresh text-success"></span></span>
           </div>
         </section>
         <section class="form-group">
        

           
         </section>
        </div>
      </div>
    </div>
    <div class="col-sm-9">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title"><strong>Artist Commission Report</strong></h4>
        </div>
        <div class="panel-body">
        <!-- <section class="row">

          <div class="col-md-3">
            <div class="form-group">
              <h5 for="">Report Type</h5>
              <select name="" id="report-type" class="form-control input-sm">
                <option value="0" selected disabled> Select Report</option>
                <option value="all"> All Level</option>
                <option value="date"> By Date</option>
              </select>
            </div>
          </div>

          <div class="col-sm-3" id="date-picker">
            <section class="form-group">
              <h5>Select Date</h5>

              <div class="input-group">
                <input id="package" type="text" class="form-control input-sm" aria-label="">
                <span class="input-group-addon" style="border-radius: 0"><span class=" fa
                fa-calendar"></span></span>
              </div>
            </section>
          </div>
        </section> -->

         <table id="artist-reports" class="table table-bordered table-sochic" style="margin-top: 5%;">
           <thead>
           <tr>
             <th class="col-sm-2">Date</th>
             <th class="col-sm-3">Artist</th>
             <th class="col-sm-3">Service / Package</th>
             <th class="col-sm-2">Commission</th>
           </tr>
           </thead>
          <tfoot>
            <tr>
              <th colspan="3" style="text-align: right;">Total (PHP)</th>
              <th></th>
            </tr>
          </tfoot>
         </table>
        </div>
      </div>
    </div>
  </div>
</section>

<script> 
// var start = '';
// var end = '';


//  function artist_detail(id){


//     $('.date-picker').daterangepicker({
//       "ranges": {
//         'Today': [moment(), moment()],
//         'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
//         'Last 7 Days': [moment().subtract(6, 'days'), moment()],
//         'Last 30 Days': [moment().subtract(29, 'days'), moment()],
//         'This Month': [moment().startOf('month'), moment().endOf('month')],
//         'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
//       },

//       "alwaysShowCalendars": true,
//       "startDate": moment().format('DD/MM/YYYY'),
//       "endDate": moment().format('DD/MM/YYYY')

//     }, function (start, end, label) {

//       var start = start.format('YYYY-MM-DD');
//       var end = end.format('YYYY-MM-DD');

//       $('#artist-reports').DataTable({
//         ajax:{
//           url: '<?php echo base_url('reports/artist_report_by_date  '); ?>',
//           data:{id : id, start :start, end:end, id:id},
//            type:'POST'
//         },
//         dom: 'Bfrtip',
//         buttons: [
//                 {
//                     extend:    'csv',
//                     text:      '<i class="fa fa-file-excel-o text-success"></i>',
//                     titleAttr: 'CSV',
//                     className:'btn btn-sm btn-white'
//                 },
//                 {
//                     extend:    'pdf',
//                     text:      '<i class="fa fa-file-pdf-o text-danger"></i>',
//                     titleAttr: 'PDF',
//                     className:'btn btn-sm btn-white'
//                 },
//                 {
//                     extend:    'print',
//                     text:      '<i class="fa fa-print"></i>',
//                     // titleAttr: 'print',
//                     className:'btn btn-sm btn-white',
//                     exportOptions: {
//                                    columns: ':visible'
//                                    }
//                 },
//                 { 
//                   extend:    'colvis',
//                   text:      'custom print',
//                   // titleAttr: 'PDF',
//                   className:'btn btn-sm btn-white'
//                 }
                
//             ],  
//         destroy:true,
//         columns:[
//           {data:'date'},
//           {data:'artist'},
//           {data:'service'},
//           {data:'commission'},
//         ],
//         "footerCallback": function ( row, data, start, end, display ) {
//             var api = this.api(), data;
        
//             // Remove the formatting to get integer data for summation
//             var intVal = function ( i ) {
//                 return typeof i === 'string' ?
//                     i.replace(/[\$,]/g, '')*1 :
//                     typeof i === 'number' ?
//                         i : 0;
//             };
        
//             // Total over all pages
//             total = api.column( 3 ).data().reduce( function (a, b) {
//                     return intVal(a) + intVal(b);
//                 }, 0 );
        
//             // Total over this page
//             pageTotal = api.column( 3, { page: 'current'} ).data().reduce( function (a, b) {
//                     return intVal(a) + intVal(b);
//                 }, 0 );
        
//             // Update footer
//             $( api.column( 3 ).footer() ).html(
//                 number_comma(pageTotal.toFixed(2)) 
//             );
//         }

//        });
      


//     });




//  }

 function artist1(){
  $('#artist-list-select').html('');
  $('#artist-list-select').append('<option selected disabled>Select Artist</option>');
  $.ajax({
     url:'<?php echo base_url('reports/get_artist'); ?>',
     dataType:'json',
     success:function(data){
      $.each(data, function(index, data){
         $('#artist-list-select').append('<option value="'+data.id+'">'+data.name+'</option>');
      });
     }

  });
 }

$(document).ready(function(){



  $('.date-picker').daterangepicker({
    "ranges": {
      'Today': [moment(), moment()],
      'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Last 7 Days': [moment().subtract(6, 'days'), moment()],
      'Last 30 Days': [moment().subtract(29, 'days'), moment()],
      'This Month': [moment().startOf('month'), moment().endOf('month')],
      'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },

    "alwaysShowCalendars": true,
    "startDate": moment().format('DD/MM/YYYY'),
    "endDate": moment().format('DD/MM/YYYY')

  });


report('','');

  artist1();


$('#btn-refresh').click(function(){
  report('','');
});

var global_id = '';

$('#artist-list-select').change(function(){

  global_id = $(this).val();


  get(global_id);


});













    
   
}); 

function get(id){


  $('.date-picker').daterangepicker({
    "ranges": {
      'Today': [moment(), moment()],
      'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Last 7 Days': [moment().subtract(6, 'days'), moment()],
      'Last 30 Days': [moment().subtract(29, 'days'), moment()],
      'This Month': [moment().startOf('month'), moment().endOf('month')],
      'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },

    "alwaysShowCalendars": true,
    "startDate": moment().format('DD/MM/YYYY'),
    "endDate": moment().format('DD/MM/YYYY')

  }, function (start, end, label) {

    var start = start.format('YYYY-MM-DD');
    var end = end.format('YYYY-MM-DD');


          $('#artist-reports').DataTable({
            ajax:{
              url: '<?php echo base_url('reports/artist_report_by_date  '); ?>',
              data:{id : id, start :start, end:end, id:id},
               type:'POST'
            },
            dom: 'Bfrtip',
            buttons: [
                    {
                        extend:    'csv',
                        text:      '<i class="fa fa-file-excel-o text-success"></i>',
                        titleAttr: 'CSV',
                        className:'btn btn-sm btn-white'
                    },
                    {
                        extend:    'pdf',
                        text:      '<i class="fa fa-file-pdf-o text-danger"></i>',
                        titleAttr: 'PDF',
                        className:'btn btn-sm btn-white'
                    },
                    {
                        extend:    'print',
                        text:      '<i class="fa fa-print"></i>',
                        // titleAttr: 'print',
                        className:'btn btn-sm btn-white',
                        exportOptions: {
                                       columns: ':visible'
                                       }
                    },
                    { 
                      extend:    'colvis',
                      text:      'custom print',
                      // titleAttr: 'PDF',
                      className:'btn btn-sm btn-white'
                    }
                    
                ],  
            destroy:true,
            columns:[
              {data:'date'},
              {data:'artist'},
              {data:'service'},
              {data:'commission'},
            ],
            "footerCallback": function ( row, data, start, end, display ) {
                var api = this.api(), data;
            
                // Remove the formatting to get integer data for summation
                var intVal = function ( i ) {
                    return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '')*1 :
                        typeof i === 'number' ?
                            i : 0;
                };
            
                // Total over all pages
                total = api.column( 3 ).data().reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );
            
                // Total over this page
                pageTotal = api.column( 3, { page: 'current'} ).data().reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );
            
                // Update footer
                $( api.column( 3 ).footer() ).html(
                    number_comma(pageTotal.toFixed(2)) 
                );
            }

           });



  });

}





function report(start ,end){



var url = '<?php echo base_url('reports/artist_report_all'); ?>';
var type = 'GET';
  if(start != '' && end != ''){
    type = 'POST';
    url = '<?php echo base_url('reports/artist_report_by_date'); ?>';
  }

   $('#artist-reports').DataTable({
   ajax:{
     url: url,
     type: type,
     data:{start : start, end : end}
   },
   dom: 'Bfrtip',
   buttons: [
           {
               extend:    'csv',
               text:      '<i class="fa fa-file-excel-o text-success"></i>',
               titleAttr: 'CSV',
               className:'btn btn-sm btn-white'
           },
           {
               extend:    'pdf',
               text:      '<i class="fa fa-file-pdf-o text-danger"></i>',
               titleAttr: 'PDF',
               className:'btn btn-sm btn-white'
           },
           {
               extend:    'print',
               text:      '<i class="fa fa-print"></i>',
               // titleAttr: 'print',
               className:'btn btn-sm btn-white',
               exportOptions: {
                              columns: ':visible'
                              }
           },
           { 
             extend:    'colvis',
             text:      'custom print',
             // titleAttr: 'PDF',
             className:'btn btn-sm btn-white'
           }
           
       ],  
   destroy:true,
   columns:[
     {data:'date'},
     {data:'artist'},
     {data:'service'},
     {data:'commission'},
   ],
   "footerCallback": function ( row, data, start, end, display ) {
       var api = this.api(), data;
   
       // Remove the formatting to get integer data for summation
       var intVal = function ( i ) {
           return typeof i === 'string' ?
               i.replace(/[\$,]/g, '')*1 :
               typeof i === 'number' ?
                   i : 0;
       };
   
       // Total over all pages
       total = api.column( 3 ).data().reduce( function (a, b) {
               return intVal(a) + intVal(b);
           }, 0 );
   
       // Total over this page
       pageTotal = api.column( 3, { page: 'current'} ).data().reduce( function (a, b) {
               return intVal(a) + intVal(b);
           }, 0 );
   
       // Update footer
       $( api.column( 3 ).footer() ).html(
           number_comma(pageTotal.toFixed(2)) 
       );
   }

  });
}

// function get_artist(id){

//   $.ajax({
//     url:'<?php echo base_url('reports/artist_report'); ?>',
//     data:{id:id},
//     type:'POST',
//     success:function(data){

//     }
//   });




//   // var oTable = $('#service-report').DataTable({
//   //   destroy:true,
//   //   bSort:false,
//   //   language: {
//   //     "sSearch": "Search"
//   //   },
//   //   ajax:{
//   //     url: '<?php echo base_url('reports/get_service_sales_by_date');  ?>',
//   //     type:'POST',
//   //     data: {start: start, end: end},
//   //     dataType: 'json'
//   //   },
//   //   columns: [
//   //             { "data": "date" },
//   //             { "data": "name" },
//   //             { "data": "price" },
//   //             { "data": "vat" },
//   //             { "data": "num" },
//   //             { "data": "total" }
//   //         ]

//   // }); 
// }

  // $(document).ready(function () {

  //   // $('#date-container').hide();



 


  //   $('#artist').daterangepicker({
  //     "ranges": {
  //       'Today': [moment(), moment()],
  //       'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
  //       'Last 7 Days': [moment().subtract(6, 'days'), moment()],
  //       'Last 30 Days': [moment().subtract(29, 'days'), moment()],
  //       'This Month': [moment().startOf('month'), moment().endOf('month')],
  //       'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
  //     },

  //     "alwaysShowCalendars": true,
  //     "startDate": moment().format('DD/MM/YYYY'),
  //     "endDate": moment().format('DD/MM/YYYY')

  //   }, function (start, end, label) {

  //     var start = start.format('YYYY-MM-DD');
  //     var end = end.format('YYYY-MM-DD');


      


  //   });




  // });

</script>