<?php
function link_article($page,$pages_count,$parametr){
	for($j = 1; $j <= $pages_count;$j++){
		if($j==$page){
		echo '<a class="nav_active"><b>'.$j.'</b></a>';
		}else{
		echo '<a class="nav_active" href='.$SERVER['PHP_SELF'].'?category_id='.$parametr.'&page='.$j.'>'.$j.'</a>';
		}
		if($j != $page_count) echo '';
	}
	return true;
	
}



?>