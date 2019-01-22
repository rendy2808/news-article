<div class="container-fluid mt-5">
<br>
<div class="table-responsive">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Author</th>
      <th scope="col">Date</th>
      <th scope="col">Pic</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($record as $a): ?>
    <tr>
      <th scope="row"><?= $a['id']; ?></th>
      <td><?php echo $a['title']; ?></td>
      <td><?php echo $a['author']; ?></td>
      <td><?php echo $a['date']; ?></td>
      <td><img class="img-thumbnail" height="100" width="100" src="<?php echo base_url(); ?>assets/post/<?php echo $a['image_name']; ?>"></td>
      <td><a href="<?php echo base_url()?>edit_article/<?php echo $a['id']?>" class="btn btn-primary">Edit</a></td>
      <td><a href="<?php echo base_url()?>delete_article/<?php echo $a['id']?>/<?php echo $a['image_name']?>" class="btn btn-danger">Delete</a></td>
    </tr>
    <?php endforeach; ?>
    
  </tbody>
</table>

</div>
</div>