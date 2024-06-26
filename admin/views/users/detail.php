<div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                  Chi tiết người dùng
                </h6>
              </div>
              <div class="card-body">
                <table class="table">
                    <tr class="text-center">
                        <th>Trường dữ liệu</th>
                        <th>Dữ liệu</th>
                    </tr>
                    <?php foreach($user as $fieldName => $value) { ?>
                    <tr class="text-center">
                        <td><?= $fieldName ?></td>
                        <td><?php
                          switch ($fieldName) {
                            case 'password':
                              echo "********";
                              break;
                          case 'role':
                              echo $value
                              ? '<span class="badge badge-success">Admin</span>'
                              : '<span class="badge badge-warning">user</span>';
                              break;
                            
                            default:
                              echo $value;  
                              break;
                          }
                        ?></td>
                    </tr>
                    <?php }?>
                </table>

                <div class="d-flex justify-content-center">
                <a href="<?= BASE_URL_ADMIN?>?act=users" class="btn btn-warning mx-3">Quay lại</a>
                </div>
              </div>
            </div>