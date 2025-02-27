<!-- COPYRIGHT-->
<section class="p-t-60 p-b-20">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    <p>Copyright &copy; <?php echo $sitename.' '. date('Y');?></p> by <a href="https://softhood.net" target="_parent" rel="author">Softhood</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END COPYRIGHT-->
</div>

</div>
<!-- Jquery JS-->
<script src="../../framework/assets/panel/vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src=../../framework/assets/panel/vendor/bootstrap-4.1/popper.min.js"></script>
<script src="../../framework/assets/panel/vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script src="../../framework/assets/panel/vendor/slick/slick.min.js">
</script>
<script src="../../framework/assets/panel/vendor/toastr/js/toastr.min.js"></script>
<script src="../../framework/assets/panel/vendor/wow/wow.min.js"></script>
<script src="../../framework/assets/panel/vendor/animsition/animsition.min.js"></script>
<script src="../../framework/assets/panel/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
</script>
<script src="../../framework/assets/panel/vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="../../framework/assets/panel/vendor/counter-up/jquery.counterup.min.js">
</script>
<script src="../../framework/assets/panel/vendor/circle-progress/circle-progress.min.js"></script>
<script src="../../framework/assets/panel/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="../../framework/assets/panel/vendor/chartjs/Chart.bundle.min.js"></script>
<script src="../../framework/assets/panel/vendor/select2/select2.min.js">
<script src="../../framework/assets/panel/vendor/DataTables/js/DataTabless.min.js"></script>
<script src="../../framework/assets/panel/vendor/DataTables/js/jquery.dataTables.min.js"></script>
<script src="../../framework/assets/panel/vendor/DataTables/js/dataTables.semanticui.min.js"></script>
<script src="../../framework/assets/panel/vendor/DataTables/js/dataTables.jqueryui.min.js"></script>
<script src="../../framework/assets/panel/vendor/DataTables/js/dataTables.foundation.min.js"></script>
<script src="../../framework/assets/panel/vendor/DataTables/js/dataTables.bootstrap4.min.js"></script>
<script src="../../framework/assets/panel/vendor/lightbox/lightbox.js"></script>
<!-- Main JS-->
<script src="../../framework/assets/panel/js/main.js"></script>
<script src="../../framework/assets/panel/js/custom.js"></script>
<script>

    $(document).ready(function() {
        var table = $('#example').DataTable( {
            responsive: true
        } );

        new $.fn.dataTable.FixedHeader( table );
    } );
</script>



</body>

</html>
<!-- end document-->
