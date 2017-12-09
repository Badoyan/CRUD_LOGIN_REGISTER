<?php 
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null == $id ) {
        header("Location: index.php?page=list");
        exit();
    }

    $newsMethod = new NewsActions(); 
    if ( !empty($_POST)) {
        $newsMethod->createUpdateNews($_POST,'update',$id);
        header("Location: index.php?page=list");

    } else {
        $data = $newsMethod->getSinglNew($id);
        if ( !empty($data) ) {
            $title = $data['title'];
            $author = $data['author'];
            $content = $data['content'];
        }
        else {
            header("Location: index.php?page=list");
        }

    }
    exit();
?>
<div class="container">
    <div class="span10 offset1">
        <div class="row">
            <h3>Update a Customer</h3>
        </div>
        <form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
          <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
            <label class="control-label">Title</label>
            <div class="controls">
                <input name="title" type="text"  placeholder="Title" value="<?php echo !empty($title)?$title:'';?>">
                <?php if (!empty($nameError)): ?>
                    <span class="help-inline"><?php echo $titleError;?></span>
                <?php endif; ?>
            </div>
          </div>
          <div class="control-group <?php echo !empty($authorError)?'error':'';?>">
            <label class="control-label">Author</label>
            <div class="controls">
                <input name="author" type="text" placeholder="Author" value="<?php echo !empty($author)?$author:'';?>">
                <?php if (!empty($authorError)): ?>
                    <span class="help-inline"><?php echo $authorError;?></span>
                <?php endif;?>
            </div>
          </div>
          <div class="control-group <?php echo !empty($contentError)?'error':'';?>">
            <label class="control-label">Content</label>
            <div class="controls">
                <textarea name="content" type="text"  placeholder="Content" value="<?php echo !empty($content)?$content:'';?>">
                    <?php echo !empty($content)?$content:'';?>
                </textarea>
                <?php if (!empty($contentError)): ?>
                    <span class="help-inline"><?php echo $contentError;?></span>
                <?php endif;?>
            </div>
          </div>
          <div class="form-actions">
              <button type="submit" class="btn btn-success">Update</button>
              <a class="btn" href="index.php?page=list">Back</a>
            </div>
        </form>
    </div>
</div> <!-- /container -->