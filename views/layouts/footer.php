<footer id="footer"><!--Footer-->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2015</p>
                <p class="pull-right">Курс PHP Start</p>
            </div>
        </div>
    </div>
</footer><!--/Footer-->



<script src="/views/templateShop/js/jquery.js"></script>
<!-- include jQuery -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<!-- include Cycle2 -->
<script src="/views/templateShop/js/jquery.cycle2.js"></script>

<!-- include one or more optional Cycle2 plugins -->
<script src="/views/templateShop/js/jquery.cycle2.carousel.js"></script>
<script src="/views/templateShop/js/bootstrap.min.js"></script>
<script src="/views/templateShop/js/jquery.scrollUp.min.js"></script>
<script src="/views/templateShop/js/price-range.js"></script>
<script src="/views/templateShop/js/jquery.prettyPhoto.js"></script>
<script src="/views/templateShop/js/main.js"></script>

<script>
    $(document).ready(function(){
        $(".add-to-cart").click(function () {
            var id = $(this).attr("data-id");
            $.post("/cart/addAjax/"+id, {}, function (data) {
                $("#cart-count").html(data);
            });
            return false;
        });
    });
</script>
</body>
</html>