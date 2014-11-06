 <h2><?php echo $ch_name; ?></h2>
 <table>
 <?php foreach ($ch_info as $key=> $value) :?>
  <tr>
    <td>[<?php echo $key ?>]:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
    <td><?php echo $value ?></td>
  </tr>
  <?php endforeach; ?>

  </table> 