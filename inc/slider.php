<?php 
    $query = "SELECT * FROM tbl_slider";
    $result = $db->select($query);
    if($result):
        
?>
<div class="slidersection templete clear">
        <div id="slider">

            <?php while($row = $result->fetch_assoc()): ?>
            <a href="#"><img src="admin/upload/<?php echo $row['image']?>" title="<?php echo $row['title'];?>" /></a>

            <?php endwhile; ?>
        </div>

</div>
<?php endif; ?>