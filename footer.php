<style>
   .modal-dialog.large {
    width: 80% !important;
    max-width: unset;
  }
  .modal-dialog.mid-large {
    width: 50% !important;
    max-width: unset;
  }
 </style>
 
 <script>
 	$('.datepicker').datepicker({
 		format:"yyyy-mm-dd"
 	})
 	 window.start_load = function(){
    $('body').prepend('<di id="preloader2"></di>')
  }
  window.end_load = function(){
    $('#preloader2').fadeOut('fast', function() {
        $(this).remove();
      })
  }

  window.load_cart = function(){
    $.ajax({
      url:'admin/ajax.php?action=get_cart_count',
      success:function(resp){
        if(resp > -1){
          resp = resp > 0 ? resp : 0;
          $('.item_count').html(resp)
        }
      }
    })
  }
  $(document).ready(function(){
    load_cart()
     $('#preloader').fadeOut('fast', function() {
        $(this).remove();
      })
  })
 </script>
        <!-- Bootstrap core JS-->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
        <!-- Core theme JS-->

        <script src="js/scripts.js"></script>