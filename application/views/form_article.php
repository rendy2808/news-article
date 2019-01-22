
<div class="container mt-5">
<br>

      <div class="row">
        <form action="<?php echo base_url()?>new_article" method="post" enctype="multipart/form-data">
          <label>Title</label><br>
          <input type="text" name="title" value=""><br><br>
          <label>Content</label><br>
          <textarea name="content" rows="8" cols="80"></textarea><br><br>
          <label>Author</label><br>
          <input type="text" name="author" value=""><br><br>
          <label>foto</label><br>
          <input type="file" name="image"><br><br>
          

          <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </form>

      </div>
    </div>
