<?php 
include 'admin/db_connect.php'; 
?>
<style>
    .head {
        max-height: 300px !important;
        height: 300px !important;
        background: url(admin/assets/uploads/gallery/7_img.jpeg);
        background-repeat: no-repeat;
        background-size: cover;
       
        
    }
    .heading{
        background-color:cadetblue;
        border-radius: 20px;
    }
</style>

<header class="head">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-lg-3 heading">
                    <h4 class="text-white ">Gallery</h4>
            </div>
        </div>
</header>
<div class="container-fluid mt-3 pt-2">
    
    <div class="row-items">
    <div class="col-lg-12">
        <div class="row">
    <?php
    $rtl ='rtl';
    $ci= 0;
    $img = array();
    $fpath = 'admin/assets/uploads/gallery';
    $files= is_dir($fpath) ? scandir($fpath) : array();
    foreach($files as $val){
        if(!in_array($val, array('.','..'))){
            $n = explode('_',$val);
            $img[$n[0]] = $val;
        }
    }
    $gallery = $conn->query("SELECT * from gallery order by id desc");
    while($row = $gallery->fetch_assoc()):
        
        
    ?>
    <div class="col-md-6">
        
         <div class="card gallery-list bg-dark"  data-id="<?php echo $row['id'] ?>">
         
            <img id ="im" src="<?php echo isset($img[$row['id']]) && is_file($fpath.'/'.$img[$row['id']]) ? $fpath.'/'.$img[$row['id']] :'' ?>" class="img-fluid " alt="" style="height:400px; width:800px; ">
           
        
        <div class="card-img-overlay text-dark">
            <h5 class="card-title"><?php echo ucwords($row['about']) ?></h5>
             
        </div>
        </div> 
    <br>
    </div>
    <?php endwhile; ?>
    </div>
    </div>
    </div>
</div>


<script>
    // $('.card.gallery-list').click(function(){
    //     location.href = "index.php?page=view_gallery&id="+$(this).attr('data-id')
    // })
 
</script>