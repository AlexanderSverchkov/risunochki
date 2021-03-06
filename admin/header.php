<!DOCTYPE html>
<head>
<title><?= $row_category['name'];?></title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>
		$(function() {
			var pull = $('#pull');
				menu = $('.menu ul');
				menuHeight= menu.height();

			$(pull).on('click', function(e) {
				e.preventDefault();
				menu.slideToggle();
			});

			$(window).resize(function(){
        		var w = $(window).width();
        		if(w > 320 && menu.is(':hidden')) {
        			menu.removeAttr('style');
        		}
    		});
		});
	
</script>
<style type="text/css">
*{
margin:0;
padding:0;
}
body{
font-family:Arial,Helvetica, sans-serif; line-height:1.3;
}
a{
text-decoration:none;
}
a:hover{
text-decoration:underline;
}
ul{
list-style:none;
}
.head-wrapper{
width:100%;
}
	.head{
	margin:0 auto;
	overflow:hidden;
	
	}
		.head img{
		max-width:100%;
		}
		.head-logo{
		float:left;
		margin:0 0 0 25px;
		width:8%;
		}
		.head-name{
		float:right;
		margin:30px 250px 0 0;
		font-size: 100% ;
		width:43%;
		}
.menu-wrapper{
width:100%
	}
	.menu{
	border-top:1px solid #c3c2db;
	border-bottom:1px solid #c3c2db;
	margin:0 auto;
	overflow:hidden;
	}
	
	.menu ul{
	float:left;
	
	
	}
		.menu ul li{
		float:left;
		padding:7px 15px;
		}
		.menu ul li a{
					color:#3831c8;
					font:14px Verdana;
					display:block;
				}
		.menu a#pull{
		clear:both;
		display:block;
		display:none;
		}
.content-wrapper{
width:100%;
}
	.content-main{
	overflow:hidden;
	margin:0 auto;
	padding:25px 10px 15px 10px;
	}
		.content{
		float:left;
		width:67%;
		}
		
			.articles{
				overflow:hidden; font-size:13px; color:#373737; border-bottom:1px solid #c3c2db; padding-bottom:25px; margin-bottom:25px;
			}
			.articles img{
			float:left;
			padding:8px;
			width:100px;
			}
			.articles p{
			padding:7px;
			}
			.articles h4{
			font-size:120%;
			text-transform:uppercase;
			}
			
				.articles a{
					color:#3831c8;
				}
			
				
				.articles h1{
					font-size:16px; margin-bottom:15px;
				}
					.articles h1 a{
						color:#707073;
					}
				.articles p{
					margin-bottom:15px;
				}
		
			.pager{
				margin:0 auto 25px auto; display:table; font-size:35px; font-weight:bold; color:#868686;
			}
			.pager a{
				color:#868686; padding:0 7px; float:left;
			}
			.pager a:hover{
				text-decoration:none; color:#eb4900;
			}
			a.prev-next{
				color:#eb4900;
			}
			.pager span{
				padding:0 7px; float:left;
			}
		
		.sidebar{
		
		float:right;
		width:31%;
		}

			.sidebar-widget{
				margin-bottom:20px; overflow:hidden; font-size:13px;
			}
				.sidebar-widget h3{
					font-size:16px; color:#707073; border-bottom:7px solid #eaeaf4; margin:0 0 10px 0; text-transform:uppercase;
				}
				.sidebar-widget a{
					font-size:13px; color:#535353;
				}
				
						.search-main{
				border:5px solid #e6e6e6; color:#535353; font-size:12px; overflow:hidden; padding:1px 0;
			}
			.search-txt{
				padding:5px 15px; width:70%; border:none;
			}
			.search-main input[type=text]{
				float:left;
			}
			.search-main input[type=image]{
				float:right; margin-right:5px;
			}
				
				
				
				.side-categories{
				width:100%; 
				}
				.side-categories li{
				margin:5px 5px 0 0;
				float:left;
				width:45%;
				}
				.latest-post{
				margin-bottom:10px; overflow:hidden;
				}
				.latest-post img{
				border:3px solid #eaeaf4; margin-right:15px; vertical-align:middle;
				}
.footer-info-wrapper{
	width:100%; background:#f0f0f0; padding:30px 0;
}
	.footer-info-main{
		overflow:hidden; margin:0 auto; padding:0 15px;
	}
		.footer-info{
			width:30%; float:left; margin-right:4%;
		}
		.footer-info:last-child{
			float:right; margin-right:0; width:31%;
		}
			.footer-info h3{
				color:#707073; font-size:16px; text-transform:uppercase; margin-bottom:10px;
			}
			.footer-info p{
				font-size:13px; color:#373737; line-height:2; margin:0 0 15px 0;
			}
			.footer-info ul li a{
				line-height:2; font-size:13px; color:#373737;
			}
			.footer-info p a{
				color:#eb4900;
			}

.footer-copy{
	 padding:20px 15px; margin:0 auto; overflow:hidden; font-size:12px; color:#373737;
}
	.footer-copy a{
		color:#3831c8;
	}
	.copy{
		float:left;
	}
	.by-st{
		float:right;
	}

		
@media screen and (min-width:1024px){
	.head, .menu{
	max-width:990px;
	}
	
	.content-main{
	max-width:970px;
	}
	.content-main, .footer-info-main, .footer-copy{
		max-width:960px;
	}
	.menu a#pull{
	display:none;
	}
}
@media screen and (max-width:800px){
	.head-logo{
		float:none; margin:10px 0; width:100%; text-align: center;
	}
	.head-name{
		display:none;
	}
	.content{
		float:none; width:100%; 
	}
	.sidebar{
		float:none; width:100%; 
	}
	
	.sidebar-widget:nth-child(2){
		width:48%; float:left;
	}
	.sidebar-widget:nth-child(3){
		width:48%; float:right;
	}
	.sidebar-widget:nth-child(4){
		float:left; clear:both; width:48%;
	}
	.sidebar-widget:nth-child(5){
		float:right; width:48%;
	}
	.fotter-info-wrapper{
	clear:both;
	}
	.menu ul{
		display:none;
	}
	.menu ul li{
		width:30%;
	}
	.menu a#pull{
		display:block;
		font-size:14px;
		font-weight:bold;
		color:#333;
		text-decoration:none;
		padding:10px 3%;
		width:94%;
		position:relative;
	}
	.menu a#pull:after{
		content:"";
		background:url(images/icon-menu.png) no-repeat;
		width:12px;
		height:13px;
		display:inline-block;
		position:absolute;
		top:12px;
		right:3%;
	}
	.menu .ico-social{
		position:absolute; top:5px; right:10px;
	}
}
@media screen and (max-width:480px){
	.head-logo{
		float:none; margin:10px 0; width:100%; text-align: left;
	}
	.articles-head{
		display:none;
	}
	.articles-gen-img{
		width:30%;
	}
	.articles-gen-img img{
		max-width:100%;
	}
	.menu ul li{
		width:30%;
	}
	.ads-main li{
			float:left; line-height:0; margin:0 2.5% 17px; width:45%;
		}
		.ads-main li img{
			width:100%;
		}
	.sidebar-widget:nth-child(2){
		width:100%; float:none;
	}	
	.sidebar-widget:nth-child(3){
		width:100%; float:none;
	}
	.sidebar-widget:nth-child(4){
		width:100%; float:none;
	}
	.sidebar-widget:nth-child(5){
		width:100%;float:none; text-align:center;
	}
	.footer-info, .footer-info:last-child{
		width:96%; float:none; margin:0 3% 20px;
	}
}
	
</style>

</head>
<body>
<div class="head-wrapper">
	<div class="head">
		<div class="head-logo"><a href="/"><img src="logo2.jpg" alt="логотип"/></a></div>
		<div class="head-name"><img src="title.jpg" alt="О сайте"/></div>
	</div>
</div>
