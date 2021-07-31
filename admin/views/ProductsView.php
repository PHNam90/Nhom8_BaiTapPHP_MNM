<?php 
	//load file layout.php
	$this->layoutPath = "Layout.php";
 ?>
<div class="col-md-12">
    <div style="margin-bottom:5px;">
        <a href="index.php?controller=products&action=create" class="btn btn-primary">Add products</a>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">List Products</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th style="width: 100px;">Ảnh</th>
                    <th>Tên SP</th>
                    <th style="width:150px;">Danh mục</th>
                    <th style="width: 70px;">Giá</th>
                    <th style="width: 70px;">Giảm Giá</th>
                    <th style="width:120px;"></th>
                </tr>
                <?php foreach($data as $rows): ?>
                <tr>
                    <td style="text-align: center;">
                        <?php if(file_exists("../assets/upload/products/".$rows->Anh)): ?>
                        <img src="../assets/upload/products/<?php echo $rows->Anh; ?>" style="width: 100px;">
                        <?php endif; ?>
                    </td>
                    <td><?php echo $rows->TenSP ?></td>
                    <td><?php echo $this->getCategory($rows->MaDM); ?></td>
                    <td style="text-align: center;"><?php echo number_format($rows->Gia); ?></td>
                    <td style="text-align: center;"><?php echo $rows->GiamGia; ?></td>
                    <td style="text-align:center;">
                        <a href="index.php?controller=products&action=update&id=<?php echo $rows->MaSP; ?>">Update</a>&nbsp;
                        <a href="index.php?controller=products&action=delete&id=<?php echo $rows->MaSP; ?>" onclick="return window.confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
            	<?php endforeach; ?>
            </table>
            <style type="text/css">
                .pagination{padding:0px; margin:0px;}
            </style>
            <ul class="pagination">
            	<li class="page-item disabled"><a href="#" class="page-link">Trang</a></li>
            	<?php for($i = 1; $i <= $numPage; $i++): ?>
            	<li class="page-item"><a href="index.php?controller=products&page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
            	<?php endfor; ?>
            </ul>
        </div>
    </div>
</div>