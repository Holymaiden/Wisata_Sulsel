<?php
$title = "help";
require_once("./templates/_header.php");
require_once("./templates/header.php");
require_once("./templates/sidebar.php");
require_once("../controllers/conn.php");
$content = single("SELECT content FROM contents WHERE setting = '$title'");
if (!isset($content['content'])) {
        $content['content'] = "Tidak ada konten";
}
$content['content'] = str_replace('&', '&amp;', $content['content']);
?>
<!-- Content body -->
<div class="content-body">
        <!-- Content -->
        <div class="content ">

                <div class="page-header">
                        <div>
                                <h3><?= ucfirst($title) ?></h3>
                                <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                                <li class="breadcrumb-item">
                                                        <a href="#">Home</a>
                                                </li>
                                                <li class="breadcrumb-item">
                                                        <a href="#">Forms</a>
                                                </li>
                                                <li class="breadcrumb-item active" aria-current="page"><?= ucfirst($title) ?></li>
                                        </ol>
                                </nav>
                        </div>
                </div>

                <div class="row">
                        <div class="col-md-12">
                                <div class="card">
                                        <div class="card-body">
                                                <h6 class="card-title"><?= ucfirst($title) ?></h6>
                                                <form id="editors">
                                                        <textarea name="content" id="editor"><?= $content['content'] ?></textarea>
                                                </form>
                                        </div>
                                        <div class="card-footer text-right">
                                                <button type="button" class="btn btn-primary" id="editProfile">
                                                        <i class="ti-pencil"></i>
                                                        Edit
                                                </button>
                                        </div>
                                </div>
                        </div>
                </div>

        </div>
        <!-- ./ Content -->
        <?php
        require_once("./templates/footer.php")
        ?>
        <!-- CKEditor -->
        <!-- <script src="../dashboard/vendors/ckeditor5/ckeditor.js"></script> -->
        <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
        <script>
                var editors;
                ClassicEditor
                        .create(document.querySelector('#editor'))
                        .then(newEditor => {
                                editors = newEditor;
                        })
                        .catch(error => {
                                console.error(error);
                        });

                $('#editProfile').click(function() {
                        swal.fire({
                                        title: 'Are you sure?',
                                        text: 'You want to edit help!',
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Yes, edit it!'
                                })
                                .then((option) => {
                                        if (option.isConfirmed) {
                                                $.ajax({
                                                        url: "./controllers/help/update.php?option=help",
                                                        data: {
                                                                content: editors.getData()
                                                        },
                                                        type: "POST",
                                                        success: function(data) {
                                                                iziToast.success({
                                                                        title: 'Successfull.',
                                                                        message: 'Edit it help!',
                                                                        position: 'topRight',
                                                                        timeout: 1500
                                                                });
                                                        },
                                                        error: function(data) {
                                                                iziToast.error({
                                                                        title: 'Failed,',
                                                                        message: 'Edit it help!',
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
        </script>