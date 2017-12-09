<?php 
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    } 
    if ( null==$id ) {
        header("Location: index.php?page=list");
    } else {
        $actionMethod = new NewsActions();
        $data = $actionMethod->getSinglNew($id);
    }
?>
<div class="container">
    <div class="span10 offset1">
        <div class="row">
            <h3>Read a News</h3>
        </div>
        <div class="form-horizontal" >
          <div class="control-group">
            <label class="control-label">Title</label>
            <div class="controls">
                <label class="checkbox">
                    <?php echo $data['title'];?>
                </label>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Author</label>
            <div class="controls">
                <label class="checkbox">
                    <?php echo $data['author'];?>
                </label>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Content</label>
            <div class="controls">
                <label class="checkbox">
                    <?php echo $data['content'];?>
                </label>
            </div>
          </div>
            <div class="form-actions">
              <a class="btn" href="index.php?page=list">Back</a>
           </div>  
        </div>
    </div>     
</div> <!-- /container -->