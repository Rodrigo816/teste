<?php echo validation_errors(); ?>
<?php echo form_open_multipart('news/create'); ?>

  <div class="form-group">
    <label for="title">Title</label>
    <input type="input" name="title" class="form-control" aria-describedby="title" placeholder="Add title">
  </div>
  <div class="form-group">
    <label for="state">State</label>
    <select name='state' class="form-control">
      <option value='0'>Unpublished</option>
      <option value='1'>Published</option>
    </select>
  </div>
  <div class="form-group">
  <label for="content">Example textarea</label>
    <textarea class="form-control" name="content" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>