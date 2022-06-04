<?php
require_once("../../../controllers/conn.php");
$data = many("SELECT * FROM users WHERE username LIKE '%" . $_GET['cari'] . "%' ORDER BY users.id DESC LIMIT " . $_GET['to'] . ", " . $_GET['end'] . "");
?>

<table id="example1" class="table table-striped table-bordered">
        <thead>
                <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Actions</th>
                </tr>
        </thead>
        <tbody>

                <?php if (count($data) == 0) : ?>
                        <tr>
                                <td colspan="4" class="text-center">Data tidak ditemukan</td>
                        </tr>
                <?php else : ?>

                        <?php foreach ($data as $id => $v) : ?>
                                <tr>
                                        <td><?= $id + 1 ?></td>
                                        <td><?= $v['username'] ?></td>
                                        <td><?= ucfirst($v['role']) ?></td>
                                        <td>
                                                <button type="button" onclick="editForm(<?= $v['id'] ?>)" class="btn btn-warning btn-floating"><i class="ti-settings"></i></button>
                                                <button type="button" id="deleteData" onclick="javascript:void(0)" data-id="<?= $v['id'] ?>" class="btn btn-danger btn-floating"><i class="ti-trash"></i></button>
                                        </td>
                                </tr>
                <?php endforeach;
                endif ?>

        </tbody>
        <tfoot>
                <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Actions</th>
                </tr>
        </tfoot>
</table>