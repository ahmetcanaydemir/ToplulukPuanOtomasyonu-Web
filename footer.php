
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
			"responsive":"true",
        "language": {
            "lengthMenu": "Sayfa başına _MENU_ kayıt göster",
             "emptyTable":     "Tabloda ulaşılabilir veri yok",
            "zeroRecords": "Aradığınız kayıt bulunamadı",
            "info": "_START_ - _END_ arası gösteriliyor toplam _TOTAL_ kayıt var",
            "infoEmpty": "Hiç kayıt yok",
            "decimal": ",",
            "thousands": ".",
            "infoFiltered": "(toplam _MAX_ kayıt arasından filtrelendi)",
    "loadingRecords": "Yükleniyor...",
    "processing":     "İşleniyor...",
    "search":         "Ara:",
    "paginate": {
        "first":      "İlk",
        "last":       "Son",
        "next":       "Sonraki",
        "previous":   "Önceki"
    },
    "aria": {
        "sortAscending":  ": sütun sıralaması sözlük sırasına göre",
        "sortDescending": ": sütun sıralaması sözlük sırasının tersine göre"
    }
        }
    });
    });
    </script>

</body>

</html>