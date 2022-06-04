<?php
require_once '../conn.php';
$destination = many("SELECT * FROM destinations WHERE name LIKE '%" . $_GET['cari'] . "%' ORDER BY id DESC LIMIT " . $_GET['to'] . "," . $_GET['end'] . "");
foreach ($destination as $id => $v) : ?>
        <!-- start single product -->
        <div class="col-5 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="product-style-one no-overlay">
                        <div class="card-thumbnail">
                                <?php $image = single("SELECT * FROM images WHERE destination_id='" . $v['id'] . "'") ?>
                                <a href="wisata.php?w=<?= $v['slug'] ?>"><img src="images/<?= $image['image'] ?>" alt="NFT_portfolio"></a>
                        </div>
                        <div class="product-share-wrapper">
                                <div class="profile-share">
                                        <?php
                                        $images = many("SELECT * FROM images WHERE destination_id='" . $v['id'] . "'");
                                        foreach ($images as $i => $im) :
                                        ?>
                                                <a class="avatar" data-tooltip="Image <?= $i + 1 ?>"><img src="images/<?= $im['image'] ?>" alt="Wisata"></a>
                                        <?php endforeach ?>
                                        <a class="more-author-text" href="#"><?php $type = many("SELECT `type` FROM types where id IN (" . $v['type_id'] . ")");
                                                                                $type = array_column($type, 'type');
                                                                                echo substr(implode(', ', $type), 0, 50);
                                                                                ?></a></a>
                                </div>
                                <div class="share-btn share-btn-activation dropdown">
                                        <button class="icon" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg viewBox="0 0 14 4" fill="none" width="16" height="16" class="sc-bdnxRM sc-hKFxyN hOiKLt">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.5 2C3.5 2.82843 2.82843 3.5 2 3.5C1.17157 3.5 0.5 2.82843 0.5 2C0.5 1.17157 1.17157 0.5 2 0.5C2.82843 0.5 3.5 1.17157 3.5 2ZM8.5 2C8.5 2.82843 7.82843 3.5 7 3.5C6.17157 3.5 5.5 2.82843 5.5 2C5.5 1.17157 6.17157 0.5 7 0.5C7.82843 0.5 8.5 1.17157 8.5 2ZM11.999 3.5C12.8274 3.5 13.499 2.82843 13.499 2C13.499 1.17157 12.8274 0.5 11.999 0.5C11.1706 0.5 10.499 1.17157 10.499 2C10.499 2.82843 11.1706 3.5 11.999 3.5Z" fill="currentColor"></path>
                                                </svg>
                                        </button>

                                        <div class="share-btn-setting dropdown-menu dropdown-menu-end">
                                                <button type="button" class="btn-setting-text share-text" data-bs-toggle="modal" data-bs-target="#shareModal">
                                                        Share
                                                </button>
                                                <button type="button" class="btn-setting-text report-text" data-bs-toggle="modal" data-bs-target="#reportModal">
                                                        Report
                                                </button>
                                        </div>

                                </div>
                        </div>
                        <a href="product-details.php"><span class="product-name"><?= $v['name'] ?></span></a>
                        <span class="latest-bid"><?= substr($v['description'], 0, 120) ?>...</span>
                        <div class="bid-react-area">
                                <div class="last-bid"><?= ($v['open_day'] == null) ? 'Buka Tiap Hari' : substr($v['open_day'], 0, 30) ?></div>
                                <div class="react-area">
                                        <span class="last-bid"><?= $v['entry_fee'] == 0 ? 'Gratis' : 'Rp. ' . $v['entry_fee'] ?></span>
                                </div>
                        </div>
                </div>
        </div>
        <!-- end single product -->
<?php endforeach ?>