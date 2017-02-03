<nav>
    <ul>
        <li><a href="about">About us</a></li>
        <li><a href="contact">Contact us</a></li>
    </ul>
</nav>

<h2>My Users</h2>
<ul>
    <?php foreach ($users as $user): ?>
        <li>
            <?= $user->email ?>
        </li>
    <?php endforeach; ?>
</ul>