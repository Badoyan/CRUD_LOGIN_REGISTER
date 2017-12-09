<div class="container">
    <div class="span10 offset1">
        <div class="row">
            <h3>Create a News</h3>
        </div>
 
        <form class="form-horizontal" action="create.php" method="post">
          <div class="control-group <?php echo !empty($titleError)?'error':'';?>">
            <label class="control-label">Title</label>
            <div class="controls">
                <input name="title" type="text"  placeholder="Title" value="<?php echo !empty($title)?$title:'';?>">
                <?php if (!empty($titleError)): ?>
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
              <button type="submit" class="btn btn-success">Create</button>
              <a class="btn" href="index.php?page=list">Back</a>
            </div>
        </form>
    </div>  
    </div> <!-- /container -->
<?php
    $titleError     = null;
    $authorError    = null;
    $contentError   = null;
    $title      = '';
    $author     = '';
    $content    = '';
     
    if ( !empty($_POST)) {
        $createMethod = new NewsActions();
        $data = $createMethod->createUpdateNews($_POST,'create');
        if( !empty($data) ){
            $titleError     = $data['titleError'];
            $authorError    = $data['authorError'];
            $contentError   = $data['contentError'];
            $title      = $data['title'];
            $author     = $data['author'];
            $content    = $data['content'];
        }
        header("Location: index.php?page=list");
        exit();
    }
?>