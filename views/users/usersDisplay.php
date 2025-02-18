<div class="container mt-5">
    <a href="/user/create" class="btn btn-primary">Create User</a>
</div>
<hr>
<div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['role'] ?></td>

                    <td>
                      <a href="/user/delete/<?= $user['id'] ?>"><i class="material-icons text-danger">delete</i></a>
                      <a href="/user/edit/<?= $user['id'] ?>"><i class="material-icons">edit</i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>