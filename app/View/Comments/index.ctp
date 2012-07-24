<!-- File: /app/View/Posts/index.ctp -->

<h1>Blog Comment</h1>
<?php pr($comments); ?>
<table>
    <tr>
        <th>Id</th>
        <th>Body</th>
        <th>Created</th>
    </tr>

    <?php foreach ($comments as $comment): ?>
    <tr>
        <td><?php echo $comment['Comment']['id']; ?></td>
        <td><?php echo $comment['Comment']['body']; ?></td>
        <td><?php echo $comment['Comment']['created']; ?></td>
    </tr>
    <?php endforeach; ?>

</table>

<?php echo $this->Html->link('Add comment', array('controller' => 'comment', 'action' => 'add')); ?>