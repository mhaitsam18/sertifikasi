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
<script type="text/javascript">
    var rupiah = document.getElementById("rupiah");
    if(rupiah){
        rupiah.addEventListener("keyup", function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, "Rp. ");
        });
    }
    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);
        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }
        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
    }
</script>