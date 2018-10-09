<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<!--<p><?php //echo $this->session->flashdata('statusMsg'); ?></p>-->


<form method="post" action="" enctype="multipart/form-data">
    
        <label>Choose Files</label>
        <input type="file" name="files[]" multiple/>
   
    
        <input type="submit" name="fileSubmit" value="UPLOAD"/>

</form>



<div class="row">
    <?php foreach($files as $file){ ?>
        
     <img style="width:70px;height:70px;" src="<?php echo base_url('uploads/files/'.$file['file_name']); ?>" >
            
     <?php }  ?>
    </div>

    
</div>
</body>
</html>