<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="sweetalert/sweetalert.css">
    <script src="sweetalert/sweetalert.min.js" ></script>

    <title>SEC Random</title>
  </head>
  <body class="bg-light">
    <!-- MODULARITY -->
    <?php include"config.php"; ?>

    <div class="container mt-5">
      <div class="card text-center w-50 mx-auto shadow">
        <div class="card-header">
          Suffle Random
        </div>
        <div class="card-body">
          <form class="" method="post">
            <?php if (isset($row['name'])): ?>
              <h3 class="card-text my-5"><?= $row['name']; ?></h3>
              <?php else: ?>
              <h3 class="card-text my-5">???</h3>
            <?php endif; ?>

            <button type="submit" name="shuffle" class="btn btn-primary">Shuffle</button>
            <button type="submit" name="return" class="btn btn-danger">Return All</button>
            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#add">Add New</a>
          </form>
        </div>
        <div class="card-footer text-muted">
          <?php if (isset($_POST['shuffle'])) : ?>
          Sisa Orang <?= $total_active; ?>
            <?php else: ?>
            Sisa Orang ???
          <?php endif; ?>
        </div>
      </div>
    </div>

    <!-- Sisa -->
    <div class="container mt-5">
      <table class="table w-50 mx-auto shadow mb-5">
        <thead class="thead-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Kelas</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody class="bg-white">
          <?php $i=1; foreach ($active as $row): ?>
          <tr>
            <th scope="row"><?= $i ?></th>
            <td><?= $row['name'] ?></td>
            <td><?= $row['kelas'] ?></td>
            <td scope="col">
              <a href="#" class="badge badge-warning edit" data-id="<?= $row['id']?>" data-toggle="modal" data-target="#edit">Edit</a>
              <a href="dist/delete.php?id=<?= $row['id'] ?>" class="badge badge-danger edit">Delete</a>
            </td>
          </tr>
          <?php $i++; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <!-- Modal Add -->
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="" method="post">
            <div class="modal-body">
              <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap..." name="nama" required>
              </div>
              <div class="form-group">
                <label for="kelas">Kelas</label>
                <select class="form-control" id="kelas" name="kelas" required>
                  <option value="X RPL 1">X RPL 1</option>
                  <option value="X RPL 2">X RPL 2</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="add">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="" method="post">
            <div class="modal-body">
              <input type="hidden" name="id" class="id-edit" value="">
              <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" class="form-control nama" id="nama" placeholder="Nama Lengkap..." name="nama" required>
              </div>
              <div class="form-group">
                <label for="kelas">Kelas</label>
                <select class="form-control" id="kelas" name="kelas" required>
                  <option value="X RPL 1">X RPL 1</option>
                  <option value="X RPL 2">X RPL 2</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="edit">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="jquery/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="dist/edit.js" charset="utf-8"></script>
  </body>
</html>
