<!-- Main scripts -->
<script src="../dashboard/vendors/bundle.js"></script>

<!-- Apex chart -->
<script src="../dashboard/vendors/charts/apex/apexcharts.min.js"></script>

<!-- Daterangepicker -->
<script src="../dashboard/vendors/datepicker/daterangepicker.js"></script>

<!-- DataTable -->
<script src="../dashboard/vendors/dataTable/datatables.min.js"></script>
<!-- <script src="../dashboard/assets/js/examples/datatable.js"></script> -->

<!-- Dashboard scripts -->
<script src="../dashboard/assets/js/examples/pages/dashboard.js"></script>

<!-- App scripts -->
<script src="../dashboard/assets/js/app.min.js"></script>

<!-- Prism -->
<script src="../dashboard/vendors/prism/prism.js"></script>

<!-- Javascript -->
<script src="../dashboard/vendors/select2/js/select2.min.js"></script>

<!-- Javascript -->
<script src="../dashboard/vendors/input-mask/jquery.mask.js"></script>


<!-- Javascript -->
<script src="vendors/jquery.repeater.min.js"></script>


<!-- Sweet Alert 2 -->
<script src="../assets/js/sweetalert2.all.min.js"></script>
<script src="../assets/twbs-pagination/jquery.twbsPagination.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>

<script type="text/javascript">
        $(document).ready(function() {

                var cari = "";
                var url = "../dashboard/controllers/<?= $title ?>";
                var $pagination = $('.twbs-pagination');
                var defaultOpts = {
                        totalPages: 1,
                        prev: '&#8672;',
                        next: '&#8674;',
                        first: '&#8676;',
                        last: '&#8677;',
                };

                $pagination.twbsPagination(defaultOpts);

                loadpage("", 10)

                function loaddata(to, end, cari, jml) {
                        $.ajax({
                                url: url + "/get.php",
                                data: {
                                        "to": to - 1,
                                        "end": end,
                                        "cari": cari,
                                        "jml": jml
                                },
                                type: "GET",
                                datatype: "json",
                                success: function(data) {
                                        // console.log(data)
                                        $(".dataku").html(data);
                                }
                        });
                }

                function loadpage(cari, jml) {
                        $.ajax({
                                url: url + '/get-total.php',
                                data: {
                                        "cari": cari,
                                        "jml": jml,
                                },
                                type: "GET",
                                datatype: "json",
                                success: function(response) {
                                        // console.log(response)
                                        response = JSON.parse(response);
                                        // console.log(response);
                                        if ($pagination.data("twbs-pagination")) {
                                                $pagination.twbsPagination('destroy');
                                        }
                                        $pagination.twbsPagination($.extend({}, defaultOpts, {
                                                startPage: 1,
                                                totalPages: response.total_page,
                                                visiblePages: 8,
                                                prev: '&#8672;',
                                                next: '&#8674;',
                                                first: '&#8676;',
                                                last: '&#8677;',
                                                onPageClick: function(event, page) {
                                                        if (page == 1) {
                                                                var to = 1;
                                                        } else {
                                                                var to = page * jml - (jml - 1);
                                                        }
                                                        if (page == response.total_page) {
                                                                var end = response.total_data;
                                                        } else {
                                                                var end = page * jml;
                                                        }
                                                        $('#contentx').text('Showing ' + to + ' to ' + end + ' of ' + response.total_data + ' entries');
                                                        loaddata(to, end, cari, jml);
                                                }

                                        }));
                                }
                        });
                }

                $("#cariki").keyup(function() {
                        cari = $(this).val();
                        loadpage(cari, 10);
                });
                $('.optionss').change(function() {
                        var jml = $(this).val();
                        loadpage(cari, jml);
                });

                $('#saveBtn').click(function(e) {
                        e.preventDefault();
                        $.ajax({
                                data: $('#formsKu').serialize(),
                                url: url + "/insert.php",
                                type: "POST",
                                dataType: 'json',
                                success: function(data) {
                                        $('#ajaxModal').modal('hide');
                                        $('#formInput').trigger("reset");
                                        loadpage("", 10)

                                        iziToast.success({
                                                title: 'Successfull.',
                                                message: 'Save it data!',
                                                position: 'topRight',
                                                timeout: 1500
                                        });
                                },
                                error: function(data) {
                                        console.log('Error:', data);
                                        $('#formInput').trigger("reset");
                                        $('#ajaxModal').modal('hide');
                                        iziToast.error({
                                                title: 'Failed,',
                                                message: 'Save it data!',
                                                position: 'topRight',
                                                timeout: 1500
                                        });
                                }
                        });
                });

                $('#updateBtn').click(function(e) {
                        let id = $('#id').val();
                        e.preventDefault();
                        $.ajax({
                                data: $('#formsKu').serialize(),
                                url: url + "/update.php?id=" + id,
                                type: "POST",
                                dataType: 'json',
                                success: function(data) {
                                        console.log(data)
                                        $('#ajaxModal').modal('hide');
                                        $('#formsKu').trigger("reset");
                                        loadpage('', 10);
                                        iziToast.success({
                                                title: 'Successfull,',
                                                message: 'Update it data!',
                                                position: 'topRight',
                                                timeout: 1500
                                        });
                                },
                                error: function(data) {
                                        $('#formsKu').trigger("reset");
                                        $('#ajaxModal').modal('hide');
                                        iziToast.error({
                                                title: 'Failed.',
                                                message: 'Update it data!',
                                                position: 'topRight',
                                                timeout: 1500
                                        });
                                }
                        });
                });
                $('body').on('click', '#deleteData', function() {
                        var id = $(this).data("id");
                        swal.fire({
                                        title: 'Are you sure?',
                                        text: 'You want to delete this data!',
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Yes, delete it!'
                                })
                                .then((willDelete) => {
                                        if (willDelete.isConfirmed) {
                                                $.ajax({
                                                        type: "POST",
                                                        url: url + "/delete.php?id=" + id,
                                                        success: function(data) {
                                                                loadpage('', 10);
                                                                iziToast.success({
                                                                        title: 'Successfull.',
                                                                        message: 'Delete it data!',
                                                                        position: 'topRight',
                                                                        timeout: 1500
                                                                });
                                                        },
                                                        error: function(data) {
                                                                iziToast.error({
                                                                        title: 'Failed,',
                                                                        message: 'Delete it data!',
                                                                        position: 'topRight',
                                                                        timeout: 1500
                                                                });
                                                        }
                                                });
                                        } else {
                                                swal.close();
                                        }
                                });
                });

                $('#imageUpdate').click(function(e) {
                        let id = $('#id').val();
                        e.preventDefault();
                        const file1 = $('#image1').prop('files');
                        const file2 = $('#image2').prop('files');
                        const file3 = $('#image3').prop('files');
                        if (file1.length > 0 || file2.length > 0 || file3.length > 0) {
                                let formData = new FormData();
                                formData.append('file1', file1[0]);
                                formData.append('file2', file2[0]);
                                formData.append('file3', file3[0]);
                                $.ajax({
                                        data: formData,
                                        url: url + "/file-upload.php?id=" + id,
                                        type: "POST",
                                        cache: false,
                                        processData: false,
                                        contentType: false,
                                        success: function(data) {
                                                $('#imageModal').modal('hide');
                                                $('#imageForms').trigger("reset");
                                                loadpage('', 10);
                                                iziToast.success({
                                                        title: 'Successfull,',
                                                        message: 'Update it Image!',
                                                        position: 'topRight',
                                                        timeout: 1500
                                                });
                                        },
                                        error: function(data) {
                                                $('#imageModal').trigger("reset");
                                                $('#imageForms').modal('hide');
                                                iziToast.error({
                                                        title: 'Failed.',
                                                        message: 'Update it Image!',
                                                        position: 'topRight',
                                                        timeout: 1500
                                                });
                                        }
                                });
                        }
                })
        });
</script>