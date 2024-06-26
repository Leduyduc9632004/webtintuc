<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">
      Thêm mới người dùng
    </h6>
  </div>
  <div class="card-body">
    <?php
      if (isset($_SESSION['errors'])){?>
    <div class="alert alert-danger">
      <ul>
        <?php foreach ($_SESSION['errors'] as $error) {?>
        <li><?= $error ?></li>
        <?php }?>
      </ul>
    </div>
    <?php unset($_SESSION['errors']) ?>
    <?php }?>
    <form method="post" action="" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="" class="form-label">Name</label>
          <input name="name" type="text" class="form-control" id="" aria-describedby="=">
        </div>
        
        <button type="submit" name="create" class="btn btn-primary">Thêm mới</button>
        <a class="btn btn-success" href="<?= BASE_URL_ADMIN.'?act=categories'?>">Quay về trang danh sách</a>
    </form>
  </div>
</div>