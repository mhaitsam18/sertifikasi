<!-- Vendor js -->
<script src="/js/vendor.min.js"></script>

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
<script src="/js/pages/dashboard.init.js"></script>

<!-- App js -->
<script src="/js/app.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(".clear-notification").on('click', function () {
        $.ajax({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            url: '/mahasiswa/notifikasi/clear',
            type: "post",
            success: function(data) {
                $("#show-notifikasi").html(data);
            }
        });
    })
</script>