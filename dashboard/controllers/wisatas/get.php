<?php
require_once("../../../controllers/conn.php");
$data = many("SELECT * FROM destinations WHERE name LIKE '%" . $_GET['cari'] . "%' ORDER BY destinations.id DESC LIMIT " . $_GET['to'] . ", " . $_GET['end'] . "");
?>

<table id="example1" class="table table-striped table-bordered" style="overflow:scroll;display: block;">
        <thead>
                <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Description</th>
                        <th>Address</th>
                        <th>Category</th>
                        <th>Hour</th>
                        <th>Day</th>
                        <th>Fee</th>
                        <th>Actions</th>
                </tr>
        </thead>
        <tbody>

                <?php if (count($data) == 0) : ?>
                        <tr>
                                <td colspan="10" class="text-center">Data tidak ditemukan</td>
                        </tr>
                <?php else : ?>

                        <?php foreach ($data as $id => $v) : ?>
                                <tr>
                                        <td><?= $id + 1 ?></td>
                                        <td><?= $v['name'] ?></td>
                                        <td><?= $v['slug'] ?></td>
                                        <td><?= substr($v['description'], 0, 20) ?></td>
                                        <td><?= substr($v['address'], 0, 20) ?></td>
                                        <td>
                                                <?php $type = many("SELECT `type` FROM types where id IN (" . $v['type_id'] . ")");
                                                $type = array_column($type, 'type');
                                                echo implode(', ', $type);
                                                ?>
                                        </td>
                                        <td><?= $v['open_hour'] ?> - <?= $v['close_hour']  ?> </td>
                                        <td><?= $v['open_day'] ?></td>
                                        <td><?= $v['entry_fee'] ?></td>
                                        <td>
                                                <button type="button" onclick="editForm(<?= $v['id'] ?>)" class="btn btn-warning btn-floating"><i class="ti-settings"></i></button>
                                                <button type="button" onclick="imageForm(<?= $v['id'] ?>)" class="btn btn-success btn-floating"><i class="ti-image"></i></button>
                                                <button type="button" id="deleteData" onclick="javascript:void(0)" data-id="<?= $v['id'] ?>" class="btn btn-danger btn-floating"><i class="ti-trash"></i></button>
                                        </td>
                                </tr>
                <?php endforeach;
                endif ?>

        </tbody>
        <tfoot>
                <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Description</th>
                        <th>Address</th>
                        <th>Category</th>
                        <th>Hour</th>
                        <th>Day</th>
                        <th>Fee</th>
                        <th>Actions</th>
                </tr>
        </tfoot>
</table>