

<?php
if($current_page>1){
    $prev_page = $current_page - 1; ?>
    <ul class="pagination">
    <li class="page-item"><a class="page-link" href="?per_page=<?=$item_per_page?>&page=<?=$prev_page?>">Previous</a></li>
        </ul>
<?php }
?>

<?php for($num=1;$num<=$totalpages;$num++) { ?>
    <ul class="pagination">
    <?php if($num !=$current_page) { ?>
        <?php if($num > $current_page - 3 && $num < $current_page + 3) { ?>
      <li class="page-item"><a class="page-link" href="?per_page=<?=$item_per_page?>&page=<?=$num?>"><?=$num?></a></li>
        <?php } ?>
     <?php } else { ?>
       <a class="page-link" style="color:white;background-color:#0099FF;"><?=$num?></a>
    <?php } ?>
</ul>
<?php }
if($current_page<$totalpages ){
       $next_page = $current_page + 1; ?>
       <ul class="pagination">
       <li class="page-item"><a class="page-link" href="?per_page=<?=$item_per_page?>&page=<?=$next_page?>">Next</a></li>
           </ul>
<?php } ?>
