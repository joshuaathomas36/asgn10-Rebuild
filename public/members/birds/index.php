<?php require_once('../../../private/initialize.php'); ?>

<?php
  
// Find all bicycles;
$birds = Bird::find_all();
  
?>
<?php $page_title = 'Birds'; ?>
<?php include(SHARED_PATH . '/member-header.php'); ?>

    <h1>Birds</h1>

      <a class="action" href="<?php echo url_for('/members/birds/new.php'); ?>">Add Bird</a>

  	<table border="1">
      <tr>
        <th>ID</th>
        <th>Common Name</th>
        <th>Habitat</th>
        <th>Food</th>
        <th>Conservation Level</th>
        <th>Backyard Tips</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

      <?php foreach($birds as $bird) { ?>
        <tr>
          <td><?php echo h($bird->id); ?></td>
          <td><?php echo h($bird->common_name); ?></td>
          <td><?php echo h($bird->habitat); ?></td>
          <td><?php echo h($bird->food); ?></td>
          <td><?php echo h($bird->conservation_level()); ?></td>
          <td><?php echo h($bird->backyard_tips); ?></td>
          <td><a class="action" href="<?php echo url_for('/staff/birds/show.php?id=' . h(u($bird->id))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/birds/edit.php?id=' . h(u($bird->id))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/birds/delete.php?id=' . h(u($bird->id))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

<?php include(SHARED_PATH . '/footer.php'); ?>
