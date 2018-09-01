<style>
.droptarsent {
    height: 35px;
    margin: 5px;
    padding: 10px;
}
.droptarsentlocal {
    height: 35px;
    margin: 5px;
    padding: 10px;
}
.droptarget {
    height: 35px;
    margin: 5px;
    padding: 10px;
}
.droptarget1 { 
    height: 35px;
    margin: 5px;
    padding: 10px;
}
.file_mapping_container{
    float: left;
    border: 1px solid #aaaaaa;
    min-height:300px;
}
.mapping_header{
    border:solid 1px;display: table-caption;
        text-align: center;
        font-weight: bold;
        font-size: larger;
        background-color: #f7f4f4;
        height: 35px;
}
.span_font{
     font-size: larger;
}
</style>

<form id="mapping_form" method="post" action="">

<!--Creating Header of all columns-->

                <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="col-md-2 col-sm-2 col-xs-2 mapping_header">Local Header
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3 mapping_header">Local Mapping
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3 mapping_header">File Mapping
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2 mapping_header">File Header
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2 mapping_header">Default
                        </div>
                </div> 

                <div class="col-md-12 col-sm-12 col-xs-12">
                		
                		<div class="col-md-2 col-sm-2 col-xs-2" style="border:solid 1px;">
                			<?php $totalcount = 0;
                            foreach($localheaders as $key=>$headers){
                                $br_color = in_array($headers,$Mandatory)?'style="color:red"':'';
                                ?>
							<div class="droptarsent">
                                <?php if(isset($template['LocalHeader']) && !in_array($headers,$template['LocalHeader'])){?>
								<span draggable="true" class="span_font" id="dragtarget<?php echo $totalcount ?>" <?php echo $br_color;?>><?php echo $headers?></span>
                                <?php } ?>
								<input type="hidden" id="Local_dragtarget<?php echo $totalcount ?>" value="<?php echo $headers ?>" />
							</div>
							<?php $totalcount++; }?>
						</div>

					<div class="col-md-3 col-sm-3 col-xs-3"  style="border:solid 1px;">
                    <?php 
                       $totalcount = 0;
                       foreach($localheaders as $key=>$headers){
                                ?>
							<div class="droptarget" style="border: 1px solid #aaaaaa;" id="droptarget<?php echo $totalcount;?>">

                               <?php 
                               $local_value = ''; 
                               if(isset($template['LocalHeader']) && in_array($headers,$template['LocalHeader'])){?>
                                <span draggable="true" class="span_font" id="dragtarget<?php echo $totalcount ?>"><?php echo $headers?></span>
                                <?php $local_value = $headers;} ?> 
           
                            <input type="hidden" name="local_header[]" id="Local_droptarget<?php echo $totalcount;?>" value="<?php echo $local_value;?>">                     
                            </div>
						<?php $totalcount++;} ?>
					</div>
				
<!-- Right Side File Header area -->
                
                    <div class="col-md-3 col-sm-3 col-xs-3"  style="border:solid 1px;">
                         <?php $totalcount=0;
                         foreach($localheaders as $key=>$headers){
                                ?>
                            <div class="droptarget1" style="border: 1px solid #aaaaaa;" id="droptarget_local<?php echo $totalcount;?>">

                                <?php 
                               $local_value = ''; 
                               if(isset($template['CrossMap']) && isset($template['CrossMap'][$headers])){?>
                                    <span draggable="true" class="span_font" id="dragtarget_local<?php echo $totalcount ?>"><?php echo $template['CrossMap'][$headers] ?></span>
                               <?php $local_value = $template['CrossMap'][$headers]; } ?>
                               <input type="hidden" name="file_header[]" id="File_droptarget_local<?php echo $totalcount;?>" value="<?php echo $local_value;?>">   

                            </div>
                           <?php $totalcount++;} ?> 
                    </div>

                        <div class="col-md-2 col-sm-2 col-xs-2" style="border:solid 1px;">
                            <?php 
                            $totalcount = 0;
                            foreach($fileheaders as $filekey=>$fileheader){ ?>
                            <div class="droptarsentlocal">
                                <?php if(isset($template['FileHeader']) && !in_array($fileheader['file_header'],$template['FileHeader'])){?>
                                <span draggable="true" class="span_font" id="dragtarget_local<?php echo $totalcount ?>"><?php echo $fileheader['file_header'] ?></span>
                                <?php } ?> 
                               
                                <input type="hidden" id="File_dragtarget_local<?php echo $totalcount ?>" value="<?php echo $fileheader['file_header'] ?>" />

                            </div>
                            <?php $totalcount++;}
                            $rest = count($localheaders) - $totalcount;
                            if($rest>0){
                                for($i=$totalcount;$i<count($localheaders);$i++){ ?>
                                 <div class="droptarsentlocal">
                                    <span draggable="true" id="dragtarget_local<?php echo $i ?>">&nbsp;</span>
                                 </div>

                            <?php  } } ?>
                        </div>  
            <!--Default Values-->
            <div class="col-md-2 col-sm-2 col-xs-2"  style="border:solid 1px;">
                <?php                       
                       foreach($localheaders as $headers){
                                ?>
                            <div class="droptarget" >           
                            <input type="text" name="default_values[<?php echo $headers?>]"  value="<?php echo isset($DefaultValues[$headers])?$DefaultValues[$headers]:'';?>" class="form-control input-sm">                     
                            </div>
                        <?php } ?>
            </div>                          
               
</div>
</form>
 	 
 	 