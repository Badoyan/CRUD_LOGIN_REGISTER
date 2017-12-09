<div class="container">
  <div class="row">
      <h3>News</h3>
  </div>
  <div class="row">
      <p>
          <a href="index.php?page=create" class="btn btn-success">Create</a>
      </p>
      <p>
          <a href="index.php" class="btn btn-primary">Dashboard</a>
      </p>         
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Content</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $rows = new NewsActions();
            if ( !empty( $rows->getNews() ) ) { 
              foreach ($rows->getNews() as $row) {
                echo '<tr>';
                echo '<td>'. $row['title'] . '</td>';
                echo '<td>'. $row['author'] . '</td>';
                echo '<td>'. $row['content'] . '</td>';
                echo '<td width=250>';
                echo '<a class="btn" href="index.php?page=read&id='.$row['id'].'">Read</a>';
                echo ' ';
                echo '<a class="btn btn-success" href="index.php?page=update&id='.$row['id'].'">Update</a>';
                echo ' ';
                echo '<a class="btn btn-danger" href="index.php?page=delete&id='.$row['id'].'">Delete</a>';
                echo '</td>';
                echo '</tr>';
              }
            }
          
          ?>
        </tbody>
      </table>
    </div>
</div> <!-- /container -->