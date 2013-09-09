<?php include 'views/header.php';?>

<!-- <h1>Listing posts</h1> -->
<h1>Listing Posts </h1>
<table>
  <tr>
    <th>Title</th>
    <th>Body</th>
    <th></th>
    <th></th>
    <th></th>
  </tr>
  <?php foreach($posts as $post){ ?>
  <tr>
    <td><?php echo $post['title'] ?></td>
    <td><?php echo $post['body'] ?></td>
    <td><a href="posts.php?action=show&id=<?php echo $post['id']?>" >Show</a></td>
    <td><a href="posts.php?action=edit&id=<?php echo $post['id']?>" >Edit</a></td>
    <td>
      <form class="delete_form" name="delete_form" method='post' action= "posts.php?action=delete&id=<?php echo $post['id']?>" >
        <input type="hidden" name="_method" value="delete" />
        <input type="submit" name="delete_form_submit" value="Delete"/>
      </form>
    </td> 
  </tr>
  <?php } ?>
</table>

<br />

<a href="posts.php?action=new">New Post</a>

<?php include 'views/footer.php';?>

 