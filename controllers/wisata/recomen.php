<?php
require_once '../conn.php';
$rec = many("SELECT users.username FROM `recommendations` LEFT JOIN users ON users.id=recommendations.user_id WHERE `destination_id` = '" . $_GET['id'] . "'");
if (count($rec) > 0) :
        foreach ($rec as $id => $v) :
?>
                <div class="rn-pd-sm-property-wrapper">
                        <div class="catagory-wrapper">
                                <!-- single property -->
                                <div class="pd-property-inner">
                                        <span class="color-white value"><?= $id + 1 ?>. <?= $v['username'] ?></span>
                                </div>
                                <!-- single property End -->
                        </div>
                </div>
        <?php endforeach;
else : ?>
        <div class="rn-pd-sm-property-wrapper">
                <div class="catagory-wrapper">
                        <!-- single property -->
                        <div class="pd-property-inner">
                                <span class="color-white value">Tidak Ada</span>
                        </div>
                        <!-- single property End -->
                </div>
        </div>
<?php endif ?>