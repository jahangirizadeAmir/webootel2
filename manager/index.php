<?php
include "inc/header.php";
?>
      <!--sidebar end-->
      <!--main content start-->
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="js/owl.carousel.js" ></script>
    <script src="js/jquery.customSelect.min.js" ></script>
        <script>
            $('#submit').on("click",function (){
                var price = $('#price').val();
                var count = $('#count').val();
                $.ajax({
                    url:"request/contactSetting.php",
                    dataType:"json",
                    type:"POST",
                    data:{
                        count:count,
                        price:price
                    },
                    success: function (data) {
                        if(!data['error']){
                            $('#msg').fadeIn("slow");
                        }
                    }
                });
            });
        </script>
    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>
    <!--script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
  <script>
      //owl carousel
      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true
          });
      });
      //custom select box
      $(function(){
          $('select.styled').customSelect();
      });
  </script>
  </body>
</html>
