<?php
include 'includes/header.php';
?>

<?php if(isset($_SESSION['message'])){ echo "<div class='row'><div class='col-sm-12'>". $_SESSION['message'] ."</div></div>";
unset($_SESSION['message']); } ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 my-4">
                <h1 class="text-center">Product Comments</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 placeholder">
                <img src="http://placehold.it/700x250"
                     srcset="http://placehold.it/1000x400 1000w"
                     alt="Placeholder"
                />
            </div>
        </div>

        <?php
            if(isset($_SESSION['username'])):
                $comment_query = "SELECT comments.id AS comment_id, ";
                $comment_query .= "comments.comment AS comment, ";
                $comment_query .= "comments.created_at AS created_at, ";
                $comment_query .= "users.username AS username FROM comments ";
                $comment_query .= "INNER JOIN users ON comments.user_id=users.id ";
                $comment_query .= "WHERE deleted_at IS NULL ";
                $comment_query .= "ORDER BY comments.created_at DESC LIMIT 5 ";
                $select_comments = mysqli_query($connection, $comment_query);
                if (!$select_comments) {
                    die("QUERY Failed". mysqli_error($connection));
                }
                $comment_count = mysqli_num_rows($select_comments);
                if($comment_count < 1 ):?>
                     <div class="row my-5">
                        <div class='col-sm-12'><h3 class='text-center'>No Comments Available</h3></div>;
                     </div>
                <?php else: ?>

                    <div class="row my-5">
                        <?php while ($row = mysqli_fetch_assoc($select_comments)):
                            $comment_id = escape($row['comment_id']);
                            $comment_author = escape($row['username']);
                            $comment_date = escape($row['created_at']);
                            $comment_content = escape(html_cut($row['comment'], 200));
                        ?>

                        <div class="col-12 col-md my-2">
                            <div class="card text-center">
                                <div class="card-header text-left">
                                    <?php if($comment_author === $_SESSION['username']): ?>
                                        <form action="includes/delete.php" method="post">
                                            <input hidden name="comment_id" value="<?php echo $comment_id ?>">
                                            <button class="close" name="delete_comment">&times;</button>
                                        </form>
                                    <?php endif; ?>
                                    <?php echo $comment_author ?>
                                </div>
                                <div class="card-body">
                                    <p><?php echo stripslashes(str_replace('\r\n',PHP_EOL,$comment_content)) ?></p>
                                </div>
                                <div class="card-footer text-muted">
                                    <time class="timeago" datetime="<? echo $comment_date ?>">about ago</time>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    </div>
                    <div class="row my-4">
                        <div class="col-sm-12">
                            <form role="form" action="includes/comment.php" method="post" class="form">
                                <div class="form-group">
                                    <textarea id="comment_form"
                                              name="comment_content"
                                              class="form-control form-control-sm"
                                              rows="4"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit"
                                            name="add_comment"
                                            class="btn btn-primary btn-block">Post</button>
                                </div>
                            </form>
                        </div>
                    </div>
        <?php endif;
        else: ?>
            <div class="row my-5">
                <div class="col-sm-12">
                    <h3 class="text-center">Please log in to see comments</h3>
                </div>
            </div>
        <? endif; ?>
    </div>

<?php
include 'includes/footer.php';
