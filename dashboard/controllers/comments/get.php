<?php
require_once("../../../controllers/conn.php");
$data = many("SELECT comments.*, users.username,destinations.name FROM comments LEFT JOIN users ON users.id=comments.user_id LEFT JOIN destinations ON destinations.id=comments.destination_id WHERE comment LIKE '%" . $_GET['cari'] . "%' ORDER BY comments.id DESC LIMIT " . $_GET['to'] . ", " . $_GET['end'] . "");
?>

<table id="example1" class="table table-striped table-bordered">
        <thead>
                <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Wisata</th>
                        <th>Comment</th>
                        <th>Actions</th>
                </tr>
        </thead>
        <tbody>

                <?php if (count($data) == 0) : ?>
                        <tr>
                                <td colspan="5" class="text-center">Data tidak ditemukan</td>
                        </tr>
                <?php else : ?>

                        <?php foreach ($data as $id => $v) : ?>
                                <tr>
                                        <td><?= $id + 1 ?></td>
                                        <td><?= $v['username'] ?></td>
                                        <td><?= $v['name'] ?></td>
                                        <td><?= $v['comment'] ?></td>
                                        <td>
                                                <button type="button" id="deleteData" onclick="javascript:void(0)" data-id="<?= $v['id'] ?>" class="btn btn-danger btn-floating"><i class="ti-trash"></i></button>
                                        </td>
                                </tr>
                <?php endforeach;
                endif ?>

        </tbody>
        <tfoot>
                <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Wisata</th>
                        <th>Comment</th>
                        <th>Actions</th>
                </tr>
        </tfoot>
</table>