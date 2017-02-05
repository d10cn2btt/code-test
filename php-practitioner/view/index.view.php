<?php require '__partials/nav.php'; ?>

<h2>My Users</h2>
<ul>
    <?php foreach ($users as $user): ?>
        <li>
            <?= $user->email ?>
        </li>
    <?php endforeach; ?>
</ul>