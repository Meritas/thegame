<p>It's dark and a cold wind is blowing.</p>
<p>On this unfateful evening you've encountered <?php echo $start_message['name']; ?></p>
<p>He seems to be in <?php echo $start_message['mood']; ?> mood. </p>
<?php if($start_message['align'] == 'Bad' ){ ?>
<p> But it's maybe not that bad that you attacked him, because he seems to be a bad guy</p>
<?php }else { ?>
<p> Maybe you shouldn't have attacked him, cause he looks like a good person</p>
<?php } ?>

<?php echo $go_next ?>