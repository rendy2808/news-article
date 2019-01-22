
<div class="container mt-5">
<br>

      <div class="row">
        <form action="<?php echo base_url()?>submit_edit" method="post" enctype="multipart/form-data">
          <label>Title</label><br>
          <input type="text" name="title" value="<?php echo $data->title; ?>"><br><br>
          <label>Content</label><br>
          <textarea name="content" rows="8" cols="80"><?php echo $data->content; ?></textarea><br><br>
          <label>Author</label><br>
          <input type="text" name="author" value="<?php echo $data->author; ?>"><br><br>
          <label>foto</label><br>
          <input type="file" name="image"><br><br>
          <label>Image Before Update</label><br>
          <img class="img-thumbnail" height="250" width="250" src="<?php echo base_url(); ?>assets/post/<?php echo $data->image_name; ?>">
          <br>
          <p><?php echo $data->image_name; ?></p>
          <br>

          <input type="hidden" name="id" value="<?php echo $data->id?>">

          <!-- Old File -->
          <input type="hidden" name="old_file" value="<?php echo $data->image_name?>">

          <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </form>

      </div>
    </div>
