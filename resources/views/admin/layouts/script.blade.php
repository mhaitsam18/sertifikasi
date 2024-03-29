{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> --}}

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
<script src="/js/dashboard.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script> --}}  
<!-- <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> -->
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script> -->
{{-- <script src="http://code.jquery.com/jquery-1.9.1.js"></script> --}}

<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.2.4/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap.min.js"></script>
<!-- Vendor js -->
{{-- <script src="/js/vendor.min.js"></script>

<!-- datatable js -->
<script src="/libs/datatables/jquery.dataTables.min.js"></script>
<script src="/libs/datatables/dataTables.bootstrap4.min.js"></script>
<script src="/libs/datatables/dataTables.responsive.min.js"></script>
<script src="/libs/datatables/responsive.bootstrap4.min.js"></script>

<script src="/libs/datatables/dataTables.buttons.min.js"></script>
<script src="/libs/datatables/buttons.bootstrap4.min.js"></script>
<script src="/libs/datatables/buttons.html5.min.js"></script>
<script src="/libs/datatables/buttons.flash.min.js"></script>
<script src="/libs/datatables/buttons.print.min.js"></script>

<script src="/libs/datatables/dataTables.keyTable.min.js"></script>
<script src="/libs/datatables/dataTables.select.min.js"></script>

<!-- Datatables init -->
<script src="/js/pages/datatables.init.js"></script>

<!-- optional plugins -->
<script src="/libs/moment/moment.min.js"></script>
<script src="/libs/apexcharts/apexcharts.min.js"></script>
<script src="/libs/flatpickr/flatpickr.min.js"></script>

<!-- page js -->
<script src="/js/pages/dashboard.init.js"></script> --}}
<script>

    $(document).ready(function() {
    var table = $('#myTable').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );
} );
</script>