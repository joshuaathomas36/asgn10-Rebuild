<?php

require_once('../../../private/initialize.php');

if(is_post_request()) {

  // Create record using post parameters
  $args = $_POST['bird'];

  $bird = new Bird($args);
  $result = $bird->save();
  
  if($result === true) {
    $new_id = $bird->id;
    $session->message('The bird was created successfully.');
    redirect_to(url_for('/staff/birds/show.php?id=' . $new_id));
  } else {
    // show errors
  }

} else {
  // display the form
  $bird = new Bird;
}
// The else ends here. The remainder of the page will display

?>

<?php $page_title = 'Create Bird'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

<!-- show php echo shortcut -->
  <a class="back-link" href="<?php echo url_for('/staff/birds/index.php'); ?>">&laquo; Back to List</a>

  <!-- I have purposely left the CSS names alone. 
  I hope to have time to fix the CSS soon -->
  <div class="bicycle new">
    <h1>Create Bird</h1>

    <?php  echo display_errors($bird->errors); ?>

    <form action="<?= url_for('/staff/birds/new.php'); ?>" method="post">

      <?php include('form_fields.php'); ?>
      
      <div id="operations">
        <input type="submit" value="Create Bird" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
