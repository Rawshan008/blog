<?php 
    $primary_color = "#c56cf0";
    $secondary_color = '#ff4d4d';
?>
<style>
    /* primary color  */
    .contentsection {
        background: <?php echo $primary_color;?> none repeat scroll 0 0;
    }
    .headersection {
        background: <?php echo $primary_color;?> none repeat scroll 0 0;
    }
    .myicon i {
        border: 1px solid <?php echo $primary_color;?>;
    }
.navsection ul li ul li{border-bottom:1px solid <?php echo $color;?>;}
.navsection ul li ul li:last-child{border-bottom:0px solid <?php echo $color;?>;}

/* secondary color  */
input[type="submit"] {
  background: <?php echo $secondary_color; ?> none repeat scroll 0 0;
}
.searchbtn input[type="submit"]:hover{
	background: <?php echo $secondary_color; ?> none repeat scroll 0 0;
}
.about img {
  border: 1px solid <?php echo $secondary_color; ?>;
}
.relatedpost h2 {
  border-bottom: 2px solid <?php echo $secondary_color; ?> !important;
}
.readmore a {
  border: 1px solid <?php echo $secondary_color; ?>;
  color: <?php echo $$secondary_color; ?>;
}
.samesidebar h2 {
  border-bottom: 2px solid <?php echo $secondary_color; ?>;
}
.popular h3 {
  border-bottom: 1px dashed <?php echo $secondary_color; ?>;
}
.footersection{background:<?php echo $secondary_color; ?>;}

.pagination a {
  border: 1px solid <?php echo $secondary_color; ?>;
}

.pagination a.active {
  background-color: <?php echo $secondary_color; ?>;
  border: 1px solid <?php echo $secondary_color; ?>;
}

.pagination a:hover:not(.active) {background-color: <?php echo $secondary_color; ?>;}
.searchbtn input[type="submit"]:hover{
	background: #b7801c none repeat scroll 0 0;
	border: 1px solid <?php echo $secondary_color; ?>;
	color:#fff;
}

</style>