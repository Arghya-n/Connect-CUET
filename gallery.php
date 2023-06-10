<?php 
include 'admin/db_connect.php'; 
?>


<header class="masthead">
    <div class="container h-50">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-3 align-self-end mb-4" style="background: #0000002e;">
                    <h3 class="text-white ">Gallery</h3>
            </div>
            
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
        
        $ci++;
        if($ci < 3){
            $rtl = '';
        }else{
            $rtl = 'rtl';
        }
        if($ci == 4){
            $ci = 0;
        }
    ?>
    <div class="col-md-6">
        
         <div class="card gallery-list bg-dark text-white <?php echo $rtl ?>" data-id="<?php echo $row['id'] ?>">
         
            <img src="<?php echo isset($img[$row['id']]) && is_file($fpath.'/'.$img[$row['id']]) ? $fpath.'/'.$img[$row['id']] :'' ?>" class="img-fluid " alt="">
           
        
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
    $('.book-gallery').click(function(){
        uni_modal("Submit Booking Request","booking.php?gallery_id="+$(this).attr('data-id'))
    })
    $('.gallery-img img').click(function(){
        viewer_modal($(this).attr('src'))
    })

</script>