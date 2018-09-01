

<!-- page content -->

        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Header Mapping </h3>
                 </div>
                    <div style="float: right;">
                      <a class="btn btn-app" href="javascript:void(0)"><i class="fa fa-trash" onclick="deletemapping()"></i> Delete Mapping </a>
                        <!--
                      <a class="btn btn-app"   href="javascript:void(0)" onclick="getlocalfieldsandfilefields()"><i class="fa fa-times"></i> Cancel </a>
                        -->
                      <a class="btn btn-app" href="javascript:void(0)" onclick="dialoagpopup()"><i class="fa fa-file-excel-o"></i> Upload File </a>
                       
                      <a class="btn btn-app" href="javascript:void(0);" onclick="saveTemplate()"><i class="fa fa-save"></i> Save </a>
                      
                      <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/user/disti_filemapping_default"><i class="fa fa-plus"></i> Add Default Values</a>
                                                     
                      
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
                   	 File Type<?php echo form_dropdown('system_type',$system_type,$file_type,'onchange="getfieldname()" id="system_type" class="form-control input-sm"'); ?>
                   </div>

                   <div class="col-md-6 col-sm-12 col-xs-12">
                   	 Distributor<?php echo form_dropdown('distributor',$distributor_list,$distributor_id,'onchange="getfieldname()" id="distributor_list" class="form-control input-sm"'); ?>
                   </div>

                  </div>
              </div>
          </div>
      </div>

<!-- This one for Showing Headers and uplaod header area-->

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12" id="upload_div" style="display:none">
                <div class="x_panel">
                  <div class="x_content">  

                      <br />               
                      <div  class="col-md-2 col-sm-2 col-xs-2" id="hp_label">
                       <label for="header position"> Header row position</label>
                     </div>
                     <div  class="col-md-2 col-sm-2 col-xs-2"  id="hp_input">
                      <input type="text" name="header_row" id="header_row" class="form-control input-sm">
                      </div>
                    	<div  class="col-md-3 col-sm-3 col-xs-3">
                    	<input type="file" name="header_file" id="header_file">
                      </div>
                      <div  class="col-md-3 col-sm-3 col-xs-3">
                    	<input type="button" name="uplaod" id="UploadBTN" value="Upload" class="btn btn-round btn-success" onclick="uploadfile()">
                      <img id="upload_loader" src="<?php echo base_url()?>/assets/src/img/loader.gif" style="display: none;width:100px">
                      </div>

                    </form>
                                    
                    <br />
                    <br />
                  </div>        
                </div>

              </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                   Red Color Fields: Mandatory
                    <div id="mapping_containmer"></div>
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

function uploadfile(){  //alert("Here");return false;
   //var filedata = new FormData(); 
        var filedata = new FormData();
        var files = $('#header_file')[0].files[0];
        filedata.append('header_file',files);

        var system_type = $("#system_type").val();
        var distributor_list = $("#distributor_list").val();
        var header_row = $("#header_row").val();
        filedata.append('system_type',system_type);
        filedata.append('distributor',distributor_list);
        filedata.append('header_row',header_row);
        
        $.ajax({
            url: '<?php echo base_url(); ?>/Ajax/uploadlocalfile',  
            type: 'POST',
            data: filedata,
            beforeSend:function(){
               $("#upload_loader").show();
               $("#UploadBTN").hide();
            },
            success:function(data){
                 $("#msg_content").html(data);
                 $("#msg_display").show();
                 setTimeout(function(){ $( "#msg_display" ).fadeOut("slow") }, 5000);
                 $("#upload_loader").hide();
                 $("#UploadBTN").show();
                 setTimeout(function(){ $("#upload_div" ).fadeToggle( "slow") }, 5000);
                 //$("#upload_div" ).fadeToggle( "slow");
                 getfieldname();
                 
            },
            cache: false,
            contentType: false,
            processData: false
        });
}

function dialoagpopup() {
    $( "#upload_div" ).fadeToggle( "slow", function() {
    
    });
  }

document.addEventListener("dragstart", function(event) {
    // The dataTransfer.setData() method sets the data type and the value of the dragged data
    event.dataTransfer.setData("Text", event.target.id);
    
    // Output some text when starting to drag the p element
    
    // Change the opacity of the draggable element
    event.target.style.opacity = "0.4";
});

// While dragging the p element, change the color of the output text
document.addEventListener("drag", function(event) {
});

// Output some text when finished dragging the p element and reset the opacity
document.addEventListener("dragend", function(event) {
    event.target.style.opacity = "1";
});


/* Events fired on the drop target */

// When the draggable p element enters the droptarget, change the DIVS's border style
document.addEventListener("dragenter", function(event) {
    
});

// By default, data/elements cannot be dropped in other elements. To allow a drop, we must prevent the default handling of the element
document.addEventListener("dragover", function(event) {
    event.preventDefault();
});

/* On drop - Prevent the browser default handling of the data (default is open as link on drop)
   Reset the color of the output text and DIV's border color
   Get the dragged data with the dataTransfer.getData() method
   The dragged data is the id of the dragged element ("drag1")
   Append the dragged element into the drop element
*/
document.addEventListener("drop", function(event) {
    event.preventDefault();
	 var data = event.dataTransfer.getData("Text"); 
	
    if ( event.target.className == "droptarget1") {
        var data = event.dataTransfer.getData("Text"); 
        event.target.appendChild(document.getElementById(data));
        document.getElementById("File_"+event.target.id).value=document.getElementById("File_"+data).value;
    }
	if ( event.target.className == "droptarget") { 
        var data = event.dataTransfer.getData("Text"); //alert(data);
        event.target.appendChild(document.getElementById(data));//?
        document.getElementById("Local_"+event.target.id).value=document.getElementById("Local_"+data).value;
        //var drageleent = document.getElementById(data);
       // drageleent.id = "Text_"+event.target.id;
    }
    if ( event.target.className == "droptarsent") { 
        var data = event.dataTransfer.getData("Text"); 
        var parent_element = document.getElementById(data).parentNode.id;
        event.target.appendChild(document.getElementById(data));
        document.getElementById("Local_"+parent_element).value='';
    }
    if ( event.target.className == "droptarsentlocal") { 
        var data = event.dataTransfer.getData("Text"); 
        var parent_element = document.getElementById(data).parentNode.id;
        event.target.appendChild(document.getElementById(data));
        document.getElementById("File_"+parent_element).value='';
    }
});

function getfieldname(){
   var system_type = $("#system_type").val();
   var distributor_list = $("#distributor_list").val();
   if(system_type>0 && distributor_list>0){
   $.ajax({
        url: '<?php echo base_url(); ?>/Ajax/getlocalfields',
        method: 'POST',
        data: 'system_type='+system_type+'&distributor_list='+distributor_list,
          success:function(msg){
        	//alert(msg);
        	$("#mapping_containmer").html(msg);
        }
   });
 }
}

function getlocalfieldsandfilefields(){
   var system_type = $("#system_type").val();
   var distributor_list = $("#distributor_list").val();
   if(system_type>0 && distributor_list>0){
   $.ajax({
        url: '<?php echo base_url(); ?>/Ajax/getlocalfieldsandfilefields',
        method: 'POST',
        data: 'system_type='+system_type+'&distributor_list='+distributor_list,
          success:function(msg){
          //alert(msg);
          $("#mapping_containmer").html(msg);
        }
   });
 }
}

function saveTemplate(){   
   var system_type = $("#system_type").val();
   var distributor_list = $("#distributor_list").val();
   $.ajax({
        url: '<?php echo base_url(); ?>/Ajax/addupdatetemplate',
        method: 'POST',
        data: $("#mapping_form").serialize()+"&system_type="+system_type+"&distributor_list="+distributor_list,
        success:function(msg){
           //alert(msg);
          $("#msg_content").html(msg);
          $("#msg_display").show();
          setTimeout(function(){ $( "#msg_display" ).fadeOut("slow") }, 5000);
          //$( "#msg_display" ).fadeOut("slow");
        } 

   });
}

function deletemapping(){
    var system_type = $("#system_type").val();
    var distributor_list = $("#distributor_list").val();
    $.ajax({
        url: '<?php echo base_url(); ?>/Ajax/deletemapping',
        method: 'POST',
        data: "&system_type="+system_type+"&distributor="+distributor_list,
        success:function(msg){
           //alert(msg);
          $("#msg_content").html(msg);
          $("#msg_display").show();
          getfieldname();
          setTimeout(function(){ $( "#msg_display" ).fadeOut("slow") }, 5000);
        } 

   });

} 

getfieldname();
</script>