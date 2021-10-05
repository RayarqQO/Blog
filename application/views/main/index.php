<div class="image__section">
    <div class="image__item"></div>
</div>

<?php if(empty($list)): ?>
    <p>Список постов пуст!</p>
<?php else:?>
    <?php foreach ($list as $val): ?>
        <div class="post__section">
            <div class="post__preview">
                <a href="/post/<?php echo $val['id'];?>">
                    <h2 class="post__title"><?php echo htmlspecialchars($val['name'], ENT_QUOTES);?></h2>
                    <h4 class="post__description"><?php echo htmlspecialchars($val['description'], ENT_QUOTES);?></h4>
                </a>
            </div>
        </div>
    <?php endforeach;?>
<?php endif;?>
<div class="pagination__container">
    <?php echo $pagination;?>
</div>