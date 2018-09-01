

<!-- page content -->

        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Fixed Header Mapping </h3>
                 </div>
                    <div style="float: right;">
                      <a class="btn btn-app" href="javascript:void(0)" onclick="deleteAllDefault()"><i class="fa fa-trash" ></i> Delete Values </a>

                      <a class="btn btn-app" id="countriescleanup" href="javascript:void(0)" onclick="cancelAllDefault()"><i class="fa fa-times"></i> Cancel </a>

                                            
                      <a class="btn btn-app" href="javascript:void(0);" onclick="saveDefaultValues()"><i class="fa fa-save"></i> Save </a>
                      
                      
                    </div>         

               </div>
            </div>

            <div class="clearfix"></div>

<!--Success Mgs show here-->

      <div class="row" id="msg_display" style="display: none">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="background-color: green;color:white;text-size:2em"><div class="x_content" id="msg_content"></div></div> 
            </div>
      </div>      

<!-- This one for Top Dorpdown Menu-->

  <form method="post" action="" enctype="multipart/form-data" id="upload_form">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                   <div class="col-md-3 col-sm-6 col-xs-12">
                   	 File Type<?php echo form_dropdown('system_type',$system_type,$file_type,'onchange="getDefaultList()" id="system_type" class="form-control input-sm"'); ?>
                   </div>

                   <div class="col-md-6 col-sm-12 col-xs-12">
                   	 Distributor<?php echo form_dropdown('distributor',$distributor_list,$distributor_id,'onchange="getDefaultList()" id="distributor_list" class="form-control input-sm"'); ?>
                   </div>

                  </div>
              </div>
          </div>
      </div>
</form>
<!-- This one for Showing Headers and uplaod header area-->

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                   
                    <div id="default_value_containmer"></div>
                  </div>        
                </div>

              </div>

            </div>
          </div>
        </div>
<!-- /page content -->
<!--Show Loader image from here
<div class="overlay">
    <div id="loadingimg">Uploading....</div>
</div>

-->

<script>
/* Events fired on the drag target */



function getDefaultList(){
   var system_type = $("#system_type").val();
   var distributor_list = $("#distributor_list").val();
   if(system_type>0 && distributor_list>0){
   $.ajax({
        url: '<?php echo base_url(); ?>/Ajax/default_import_values_operation',
        method: 'POST',
        data: 'Mode=GET&system_type='+system_type+'&distributor_list='+distributor_list,
          success:function(msg){
        	//alert(msg);
        	$("#default_value_containmer").html(msg);
        }
   });
 }
}

function saveDefaultValues(){   
   var system_type = $("#system_type").val();
   var distributor_list = $("#distributor_list").val();
   $.ajax({
        url: '<?php echo base_url(); ?>/Ajax/default_import_values_operation',
        method: 'POST',
        data: $("#mapping_form").serialize()+"&system_type="+system_type+"&distributor_list="+distributor_list+'&Mode=ADD',
        success:function(msg){
           //alert(msg);
          $("#msg_content").html(msg);
          $("#msg_display").show();
          setTimeout(function(){ $( "#msg_display" ).fadeOut("slow") }, 5000);
          //$( "#msg_display" ).fadeOut("slow");
        } 

   });
}

function deleteAllDefault(){
    var system_type = $("#system_type").val();
    var distributor_list = $("#distributor_list").val();
    $.ajax({
        url: '<?php echo base_url(); ?>/Ajax/default_import_values_operation',
        method: 'POST',
        data: "system_type="+system_type+"&distributor="+distributor_list+'&Mode=DEL',
        success:function(msg){
           //alert(msg);
          $("#msg_content").html(msg);
          $("#msg_display").show();
          getDefaultList();
          setTimeout(function(){ $( "#msg_display" ).fadeOut("slow") }, 5000);
        } 

   });

} 

function cancelAllDefault(){
  getDefaultList();
}




getDefaultList();
</script>