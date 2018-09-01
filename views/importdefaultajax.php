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

                        <div class="col-md-6 col-sm-6 col-xs-6 mapping_header">Local Header
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6 mapping_header">Default Values
                        </div>
                       
                </div> 
<!--Left Part Local Columns-->
                <div class="col-md-12 col-sm-12 col-xs-12">
                        
                        <div class="col-md-6 col-sm-6 col-xs-6" style="border:solid 1px;">
                            <?php 
                            foreach($LocalColumns as $key=>$headers){
                                ?>
                            <div class="droptarsent">
                               
                                <span class="span_font"><?php echo $headers ?></span>
                               
                            </div>
                            <?php  }?>
                        </div>
<!--Right Part , Fixed Values-->
                    <div class="col-md-6 col-sm-6 col-xs-6"  style="border:solid 1px;">
                    <?php 
                      
                       foreach($LocalColumns as $key=>$headers){
                                ?>
                            <div class="droptarget" >           
                            <input type="text" name="default_values[<?php echo $headers?>]"  value="<?php echo isset($DefaultValues[$headers])?$DefaultValues[$headers]:'';?>" class="form-control input-sm">                     
                            </div>
                        <?php } ?>
                    </div>
                
                                  
               
</div>
</form>
     
     