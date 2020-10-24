	<!--sidebar-->

	<div class="sidebar">
		        
		   
		   <div class="sidebar-widget">
			<? $sql = "SELECT * FROM category";
			$res = mysql_query($sql);
			
			
			?>
            	
							<h3>Разделы сайта</h3>
							
                <ul class="side-categories">
								<?
								while($row = mysql_fetch_assoc($res)){
								print "<li><a href='".$site_url."articles.php?category_id={$row['category_id']}'>{$row['name']}</a></li>\n";
								}
								?>
								 </ul>
								 </div>
								
								 
								<div class="sidebar-widget">
					            <!--Баннер гугл-->
					            			<noindex>
								<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
								<!-- Рисование 300*600 -->
								<ins class="adsbygoogle" style="display:inline-block;width:300px;height:600px" data-ad-client="ca-pub-7708851436110375" data-ad-slot="7035241910"></ins>
								<script>
								(adsbygoogle = window.adsbygoogle || []).push({});
								</script>
								</noindex>
								</div>	
								<div class="sidebar-widget">
								<!-- <a href="http://dc-logos.ru/" target="_blank"><img src="220x750.jpg" alt="детский центр Логос"/></a>-->
								</div>	
			
			
			    <div class="sidebar-widget">
            	<h3>Последние уроки</h3>
            <ul class="side-categories">
						<?php
						$last=mysql_query("SELECT article_id,title FROM articles WHERE visible='1' ORDER BY date DESC LIMIT 5") or die(mysql_error());
						while ($row = mysql_fetch_assoc($last)){
							echo "<li><a href='".$site_url."view_article.php?id={$row['article_id']}'>{$row['title']}</a></li>\n";
							}
							?>
						</ul>
						</div>  
					
             
			
			
	</div>
		<!--sidebar-->