<?php 
	$this->layoutPath = "Layout.php";
 ?>
 <div class="col-md-12">  
    <div class="panel panel-primary">
        <div class="panel-heading">Add edit category</div>
        <div class="panel-body">
        <form method="post" action="<?php echo $action; ?>">
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Tên danh mục</div>
                <div class="col-md-10">
                    <input type="text" value="<?php echo isset($record->TenDM)?$record->TenDM:""; ?>" name="TenDM" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Danh mục cha</div>
                <div class="col-md-10">
                    <?php 
                        $categories = $this->modelListCategories(isset($record->MaDM)?$record->MaDM:0);
                     ?>
                     <select name="DMCha" class="form-control" style="width:250px;">
                        <option value="0"></option>
                     <?php foreach($categories as $rows): ?>
                        <option <?php if(isset($record->DMCha)&&$record->DMCha==$rows->MaDM): ?> selected <?php endif; ?> value="<?php echo $rows->MaDM; ?>"><?php echo $rows->TenDM; ?></option>
                     <?php endforeach; ?>
                     </select>
                </div>
            </div>
            <!-- end rows -->    
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2"></div>
            </div>
            <!-- end rows -->        
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <input type="submit" value="Process" class="btn btn-primary">
                </div>
            </div>
            <!-- end rows -->
        </form>
        </div>
    </div>
</div>