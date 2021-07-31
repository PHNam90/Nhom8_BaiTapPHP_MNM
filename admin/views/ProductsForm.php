<?php 
    //load file layout.php
    $this->layoutPath = "Layout.php";
 ?>                    
<div class="col-md-12">  
    <div class="panel panel-primary">
        <div class="panel-heading">Add edit products</div>
        <div class="panel-body">
        <!-- chu y: muon upload duoc file thi phai co thuoc tinh enctype="multipart/form-data" vao trong the form -->
        <form method="post" enctype="multipart/form-data" action="<?php echo $action; ?>">
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Name</div>
                <div class="col-md-10">
                    <input type="text" value="<?php echo isset($record->TenSP)?$record->TenSP:""; ?>" name="TenSP" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Price</div>
                <div class="col-md-10">
                    <input type="text" value="<?php echo isset($record->Gia)?$record->Gia:""; ?>" name="Gia" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->  
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">% Discount</div>
                <div class="col-md-10">
                    <input type="number" min="0" max="100" value="<?php echo isset($record->GiamGia)?$record->GiamGia:""; ?>" name="GiamGia" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Category</div>
                <div class="col-md-10">
                    <select class="form-control" style="width: 250px;" name="MaDM">
                        <?php $categories = $this->modelListCategories(); ?>
                        <?php foreach($categories as $rows): ?>
                            <option <?php if(isset($record->MaDM)&&$record->MaDM==$rows->MaDM): ?> selected <?php endif; ?> value="<?php echo $rows->MaDM; ?>"><?php echo $rows->TenDM; ?></option>
                            <?php $categoriesSub = $this->modelListCategoriesSub($rows->MaDM); ?>
                            <?php foreach($categoriesSub as $rowsSub): ?>
                                <option <?php if(isset($record->MaDM)&&$record->MaDM==$rowsSub->MaDM): ?> selected <?php endif; ?> value="<?php echo $rowsSub->MaDM; ?>">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowsSub->TenDM; ?></option>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <!-- end rows -->          
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Descripition</div>
                <div class="col-md-10">
                    <textarea name="MoTa" id="MoTa">
                        <?php echo isset($record->MoTa)?$record->MoTa:""; ?>
                    </textarea>
                    <script type="text/javascript">
                        CKEDITOR.replace("MoTa");
                    </script>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Upload image</div>
                <div class="col-md-10">
                    <input type="file" name="photo">
                </div>
            </div>
            <!-- end rows -->
            <?php if(isset($record->Anh)&&file_exists("../assets/upload/products/".$record->Anh)): ?>
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <img src="../assets/upload/products/<?php echo $record->Anh ?>" style="width: 100px;">
                </div>
            </div>
            <!-- end rows -->
            <?php endif; ?>
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