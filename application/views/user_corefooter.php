    <script src="<?php echo site_url('static/admin/lib/bootstrap/js/bootstrap.js'); ?>"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    <script>
    $('#textarea').focus(function(){
    	$(this).html("");
    });
    </script>
    
  </body>
</html>