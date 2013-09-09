<?php include 'views/header.php';?>
<p>
  <b>Title:</b>
  <?php echo $post['title'] ?>
</p>

<p>
  <b>Content:</b>
  <?php echo $post['body'] ?>
</p>

<a href="posts.php?action=edit&id=<?php echo $post['id']?>" >Edit</a>
<a href="posts.php?action=index" >Back</a>

<div id="trialDeleteAjax">Click for DELETE ajax</div>
<div id="goBack">Click for going back</div>


<?php include 'views/footer.php';?>