<?php
include 'admin/db_connect.php';
?>
<style type="text/css">
  .masthead{
    height:fit-content;
  }
  img {
  max-width: 100%;
  height: auto;
}
</style>
<header class="masthead ">   
        <div class="row py-4 align-items-center justify-content-center text-center">
            <div class="col-lg-4 align-self-end" style="background: #0000002e;">
                <h2 class="text-white ">Welcome to Connect Cuet</h2>
            </div>
        </div>
</header>


 <!-- carousel -->
 <div class="container">
 <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="admin\assets\img\50years.jpg" class="d-block w-100" alt="First Slide" >
    </div>
    <div class="carousel-item">
      <img src="admin\assets\img\shadhinotachottor.jpg" class="d-block w-100" alt="Second Slide" >
    </div>
    <div class="carousel-item">
      <img src="admin\assets\img\cuet_gate.jpg" class="d-block w-100" alt="Third Slide" >
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
 </div>
 


<div class="container mt-3 pt-2">
    <h4 class="text-center text-dark">Upcoming Events</h4>
    <hr class="divider">
    <?php
    $event = $conn->query("SELECT * FROM events where date_format(schedule,'%Y-%m%-d') >= '" . date('Y-m-d') . "' order by unix_timestamp(schedule) asc");
    while ($row = $event->fetch_assoc()):
        $trans = get_html_translation_table(HTML_ENTITIES, ENT_QUOTES);
        unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
        $desc = strtr(html_entity_decode($row['content']), $trans);
        $desc = str_replace(array("<li>", "</li>"), array("", ","), $desc);
        ?>
        <div class="card event-list" data-id="<?php echo $row['id'] ?>">
            <div class="banner d-flex justify-content-center">
                <?php if (!empty($row['banner'])): ?>
                    <img src="admin/assets/uploads/<?php echo ($row['banner']) ?>" style="height:400px; width:800px;" alt="">
                <?php endif; ?>
            </div>
            <div class="card-body">
                <div class="row  align-items-center justify-content-center text-center h-100">
                    <div class="">
                        <h3><b class="filter-txt">
                                <?php echo ucwords($row['title']) ?>
                            </b></h3>
                        <div><small>
                                <p><b><i class="fa fa-calendar"></i>
                                        <?php echo date("F d, Y h:i A", strtotime($row['schedule'])) ?>
                                    </b></p>
                            </small></div>
                        <hr class="divider bg-primary" style="max-width: calc(80%)">
                        <larger class="truncate filter-txt">
                            <?php echo strip_tags($desc) ?>
                        </larger>
                        <br>
                        <hr class="divider bg-primary" style="max-width: calc(80%)">
                        <!-- <button class="btn btn-primary float-right read_more" data-id="<?php echo $row['id'] ?>">Read
                            More</button> -->
                            <button class="btn btn-primary float-right read_more" data-id="<?php echo $row['id'] ?>" >Read
                            More</button>
                    </div>
                </div>


            </div>
        </div>
        <br>
    <?php endwhile; ?>

</div>


<script>
    // $('.read_more').click(function () {
    //     location.href = "index.php?page=view_event&id=" + $(this).attr('data-id')
    // })
    $('.read_more').click(function(){
        uni_modal("Events","view_events.php?id=" +$(this).attr('data-id'),'mid-large')
    })
    $('.banner img').click(function () {
        viewer_modal($(this).attr('src'))
    })
    $('#filter').keyup(function (e) {
        var filter = $(this).val()

        $('.card.event-list .filter-txt').each(function () {
            var txto = $(this).html();
            txt = txto
            if ((txt.toLowerCase()).includes((filter.toLowerCase())) == true) {
                $(this).closest('.card').toggle(true)
            } else {
                $(this).closest('.card').toggle(false)

            }
        })
    })
</script>