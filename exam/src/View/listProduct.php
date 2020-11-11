<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<h1 style="text-align: center">LIST PRODUCT</h1>
<form action="index.php?page=search" method="post">
    Nhập tên hàng: <input type="search" name="search">
    <button class="btn btn-success">Tìm kiếm</button>
</form>
<a href="index.php?page=add" class="btn btn-success">Thêm mặt hàng</a>
<table border="1" style="width: 100%;text-align: center">
    <tr>
        <th>#</th>
        <th>Tên hàng</th>
        <th>Loại hàng</th>
        <th colspan="2">Thao tác</th>
    </tr>
    <?php if(empty($products)): ?>
    <tr>
        <td rowspan="3">No data</td>
    </tr>
    <?php else: ?>
    <?php foreach ($products as $key=>$value): ?>
    <tr>
        <td><?= $key++; ?></td>
        <td><?= $value->getName();?></td>
        <td><?= $value->getLine();?></td>
        <td><a  href="index.php?page=edit&id=<?= $value->getId() ?>" class="btn btn-success">Edit</a></td>
        <td><a onclick="return confirm('Ban co muon xoa khong?')" href="index.php?page=delete&id=<?= $value->getId() ?>" class=" btn btn-success">Delete</a></td>
    </tr>
    <?php endforeach; ?>
    <?php endif;?>
</table>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>