<?php
require_once '../conn.php';
$comments = many("SELECT comments.*,users.username FROM comments LEFT JOIN users ON users.id = comments.user_id WHERE destination_id = '" . $_GET['id'] . "'");
foreach ($comments as $v) : ?>
        <li class="comment parent">
                <div class="single-comment">
                        <div class="comment-author comment-img">
                                <img class="comment-avatar" src="assets/images/blog/comment/comment-01.png" alt="Comment Image">
                                <div class="m-b-20">
                                        <div class="commenter"><?= $v['username'] ?></div>
                                </div>
                        </div>
                        <div class="comment-text">
                                <p><?= $v['comment'] ?></p>
                        </div>
                </div>
        </li>
<?php endforeach; ?>