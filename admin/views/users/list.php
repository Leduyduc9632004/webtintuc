<div class="card shadow mb-4">
<div class="d-flex justify-content-end my-2">
<a style="width:200px" href="<?= BASE_URL_ADMIN?>?act=users-create" class="btn btn-primary">Thêm người dùng</a>
</div>
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                  Danh sách người dùng
                </h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table
                    class="table table-bordered"
                    id="dataTable"
                    width="100%"
                    cellspacing="0"
                  >
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($users as $user) { ?>
                            <tr>
                                <td><?= $user['id'] ?></td>
                                <td><?= $user['name'] ?></td>
                                <td><?= $user['email'] ?></td>
                                <td><?= $user['password'] ?></td>
                                <td><?= $user['role'] ? '<span class="badge badge-success">Admin</span>' : '<span class="badge badge-warning">user</span>'?></td>
                                <td><a href="<?= BASE_URL_ADMIN?>?act=users-detail&id=<?= $user['id']?>" class="btn btn-warning mx-3">Chi tiết</a>
                                    <a href="<?= BASE_URL_ADMIN?>?act=users-update&id=<?= $user['id']?>" class="btn btn-success">Sửa</a>
                                    <a href="<?= BASE_URL_ADMIN?>?act=users-delete&id=<?= $user['id']?>" onclick="return confirm('Bạn có muốn xóa không?')" class="btn btn-danger ">Xóa</a>
                                </td>
                              </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>