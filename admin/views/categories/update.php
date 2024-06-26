<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">
      Cập nhật người dùng
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
          <input name="name" value="<?= $category['name'] ?>" type="text" class="form-control" id="" aria-describedby="emailHelp">
        </div>
        
        <button type="submit" name="update" class="btn btn-primary">Cập nhật</button>
        <a class="btn btn-success" href="<?= BASE_URL_ADMIN.'?act=categories'?>">Quay về trang danh sách</a>
    </form>
  </div>
</div>