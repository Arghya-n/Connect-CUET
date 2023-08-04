<?php 
include 'admin/db_connect.php'; 
?>

<header class="head">
    <div class="row py-3 align-items-center justify-content-center text-center">
        <div class="col-lg-3 align-self-end mb-4 heading" >
            <h2 class="text-white ">Alumni List</h2>
        </div>    
    </div>
</header>
<div class="container ">
    <div class="card mb-4 mt-4">
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="filter-field"><i class="fa fa-search"></i></span>
                    </div>
                    <input type="text" class="form-control" id="filter" placeholder="Filter name,course, etc." aria-label="Filter" aria-describedby="filter-field">
                </div>
            </div>
            <div class="col-md-4">
                <button class="btn btn-primary btn-block btn-sm" id="search">Search</button>
            </div>
        </div>
        
    </div>
</div>
</div>	
<div class="container">
    <div class="row mb-2">
        <?php
            $fpath = 'admin/assets/uploads';
            $alumni = $conn->query("SELECT a.*,c.course,Concat(a.lastname,', ',a.firstname,' ',a.middlename) as name from alumnus_bio a inner join courses c on c.id = a.course_id order by Concat(a.lastname,', ',a.firstname,' ',a.middlename) asc");
            while($row = $alumni->fetch_assoc()):
        ?>
        <div class="col-md-6 item">
            <div class="card flex-md-row mb-4 box-shadow h-md-250" data-id="<?php echo $row['id'] ?>">
                <div class="card-body d-flex flex-column align-items-start">
            
                    <p class="filter-txt"><b><?php echo $row['name'] ?></b></p>
                    <hr class="divider w-100" style="max-width: calc(100%)">
                    <p class="filter-txt">Email: <b><?php echo $row['email'] ?></b></p>
                    <p class="filter-txt">Course: <b><?php echo $row['course'] ?></b></p>
                    <p class="filter-txt">Batch: <b><?php echo $row['batch'] ?></b></p>
                    <p class="filter-txt">Currently working in/as <b><?php echo $row['connected_to'] ?></b></p>
                        <br>
                </div>
                <div>
                <img alt="Thumbnail [200x250]" style="width: 200px; height: 250px;" src="<?php echo $fpath.'/'.$row['avatar'] ?>" data-holder-rendered="true">
                </div>
                    
            </div>
        </div>
        <?php endwhile; ?>
        
    </div>
</div>


<script>
    // $('.book-alumni').click(function(){
    //     uni_modal("Submit Booking Request","booking.php?alumni_id="+$(this).attr('data-id'))
    // })
    // $('.alumni-img img').click(function(){
    //     viewer_modal($(this).attr('src'))
    // })
     $('#filter').keypress(function(e){
    if(e.keyCode == 13)
        $('#search').trigger('click')
   })
    $('#search').click(function(){
        var txt = $('#filter').val()
       
        start_load()
        if(txt == ''){
            $('.item').show()
            end_load()
            return false;
        }
        $('.item').each(function(){
            var content = "";
            $(this).find(".filter-txt").each(function(){
                content += ' '+$(this).text()
            })
            if((content.toLowerCase()).includes(txt.toLowerCase()) == true){
                $(this).toggle(true)
            }else{
                $(this).toggle(false)
            }
        })
        end_load()
    })

</script>