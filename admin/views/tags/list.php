<div class="card shadow mb-4">
<div class="d-flex justify-content-end my-2">
<a style="width:200px" href="<?= BASE_URL_ADMIN?>?act=tags-create" class="btn btn-primary">Thêm người dùng</a>
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
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($tags as $tag) { ?>
                            <tr>
                                <td><?= $tag['id'] ?></td>
                                <td><?= $tag['name'] ?></td>
                                <td><a href="<?= BASE_URL_ADMIN?>?act=tags-detail&id=<?= $tag['id']?>" class="btn btn-warning mx-3">Chi tiết</a>
                                    <a href="<?= BASE_URL_ADMIN?>?act=tags-update&id=<?= $tag['id']?>" class="btn btn-success">Sửa</a>
                                    <a href="<?= BASE_URL_ADMIN?>?act=tags-delete&id=<?= $tag['id']?>" onclick="return confirm('Bạn có muốn xóa không?')" class="btn btn-danger ">Xóa</a>
                                </td>
                              </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>