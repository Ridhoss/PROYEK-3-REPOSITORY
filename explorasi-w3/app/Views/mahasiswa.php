<a href="/tambah-mahasiswa" class="btn btn-primary">Add</a>

<table class="table table-striped mt-2">
  <thead>
    <tr class="table-primary text-center">
      <th scope="col" style="width: 5%;">No</th>
      <th scope="col" style="width: 15%;">NIM</th>
      <th scope="col" style="width: 50%;">Nama</th>
      <th scope="col" style="width: 10%;">Umur</th>
      <th scope="col" style="width: 20%;">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if ($students) {
      $no = 1;
      foreach ($students as $student):
    ?>
        <tr class="text-center">
          <td><?= $no++ ?></td>
          <td><?= $student['nim'] ?></td>
          <td><?= $student['nama'] ?></td>
          <td><?= $student['umur'] ?></td>
          <td>
            <a href="/detail-mahasiswa/<?= $student['id'] ?>" class="btn btn-primary">Detail</a>
            <button type="button" class="btn btn-warning text-white">Edit</button>
            <button type="button" class="btn btn-danger">Delete</button>
          </td>
        </tr>
      <?php
      endforeach;
    } else {
      ?>
      <p class="text-center">Data Kosong</p>
    <?php
    }
    ?>
  </tbody>
</table>