<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Art Gallery</title>
<link rel="icon" href="logo1.png" type="image/png">
<link rel="stylesheet" href="bootstrap.min.css" type="text/css"/>
<script src="jquery-1.10.1.min.js"></script>
<script src="bootstrap.min.js"></script>
<script>
$(document).ready(function(e) {
   $('#scroll').click(function(e) {
 		$('html,body').stop().animate({scrollTop: $('#gallery').offset().top},1500);
 	});
});
</script>
<?php
		$con = mysqli_connect("localhost","root","","mf_db") or die("Error in Database");
		$sql = "select * from image";
		$result = mysqli_query($con,$sql) or die("Query has problem");
		$newurl = "";$desc = "";
		while($row1 = mysqli_fetch_assoc($result))
		{
	    		$newurl .= 'url('.$row1['image_path'].')';
				$newurl .= ";";
				$desc .= $row1['image_desc'];
				$desc .= "!";
				?>
                <script type="text/javascript">
                var newurl1 = "<?php echo $newurl; ?>";
				var desc1 = "<?php echo $desc; ?>";
				</script>
				<?php
				
		}
		mysqli_close($con);
?>

<script type="text/javascript">
var len=0,len1=0,temp1="",temp2="",v=0,x="",v1=0,x1="";
function swapimage()
{
		/*alert("swapimage");
		alert("newurl1= " + newurl1);
		alert("desc1= " + desc1);*/
		temp1 = newurl1;
		temp2 = desc1;
		len=newurl1.length;
		len1=desc1.length;
		setTimeout(function(){temp();},0);
}
function temp()
{
	
	if(len > 0 )
	{	
		v = newurl1.indexOf(";",0);
		x = newurl1.substring(0,v);
		newurl1 = newurl1.substring(v+1,len);
		len=newurl1.length;
		//document.getElementById("image").style.backgroundImage = x;
		$("#image").css("background-image",x).animate({ marginLeft: "1300px", opacity: .5 }, 1).animate({ marginLeft: "0px", opacity: 1 }, 3000);
		v1 = desc1.indexOf("!",0);
		x1 = desc1.substring(0,v1);
		desc1 = desc1.substring(v1+1,len1);
		len1=desc1.length;
		$("#desc").animate({ marginTop: "0px", opacity: .5 }, 1).animate({ marginTop: "50px", opacity: 1 }, 5000);
		document.getElementById("desc").innerHTML = x1;
		setTimeout(function(){temp();},10000);
	}
	
	else if(len == 0)
	{
		newurl1 = temp1;
		desc1 = temp2;
		len=newurl1.length;
		len1=desc1.length;
		setTimeout(function(){temp();},0);
	}	
}
</script>


<style type="text/css">
	body
	{
		overflow-x:hidden;	
	}
	#body1
	{
		height:669px;
		background-position:center;
		overflow-x:hidden;
		overflow-y:hidden;
	}
	#scroll
	{
		background: rgba(1,1,1,.5);
		text-align:center;
		color:#000;
		vertical-align:middle;
		position:relative;
		font-size:36px;
		cursor:default;	
	}
	#slide
	{
		height:400px;
		background : rgba(1,1,1,.5);
	}
	#image
	{
		background-position:center;
		background-repeat:no-repeat;
		height:400px;
	}
	#desc
	{
		font-size:24px;
		color:#FFF;
		height:400px;	
	}
	.temp_cont
	{
		height:1125px;
		line-height:50px;
		font-size:30px;
		text-align:center;
	}
	.thin_bar
	{
		height:5px;
		background-color:#000000;
		width:inherit;
	}
	.small_box
	{	
		height:115px;
		width:115px;
		padding:5px;
		position:absolute;
	}
	.small_box img,.medium_box img,.large_box img
	{
		height : 100%;
		width : 100%;
		min-height: 100%;
		min-width: 100%;
	}
	.medium_box
	{
		height:240px;
		width:240px;
		padding:5px;
		position:absolute;	
		overflow:hidden;
		display:table;
	}
	.quot
	{
		height:100%;
		display:table-cell;
		margin:0px auto;
		vertical-align:middle;
		background-color:#BEA07C;
		color:white;
		cursor:auto;
		background-color:black;
	}
	.large_box
	{
		height:365px;
		width:365px;
		padding:5px;
		position:absolute;	
	}
</style>
</head>
<body onload="swapimage()" background="p.jpg">

<b>
<font face="A Gentle Touch Medium">
	<div id="body1" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="row">
        		<div id="scroll" class="navbar navbar-btn">
       				Scroll for art gallery or Click here
                </div>
                
                <div id="slide" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                	<div id="image" class="col-lg-9 col-md-9 col-sm-9 col-xs-9"></div>
    				<div id="desc" class="col-lg-3 col-md-3 col-sm-3 col-xs-3"></div>	
 				</div>
		</div>
	</div>
    <div class="row">
    	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
    		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" id="gallery">
            <?php
				$link=mysqli_connect("localhost", "root", "","mf_db") or die("database not found");
				$sql="SELECT COUNT(PATH) as cnt FROM img_gallery";
				$result=mysqli_query($link,$sql) or die("query is wrong");
				$row=mysqli_fetch_assoc($result);
				$count=$row['cnt'];
				$path="images/imgs/";
				for($i=0;$i<$count;$i++)
				{
					$sql="SELECT * FROM img_gallery where ID=".($i+1);
					$result=mysqli_query($link,$sql) or die("query is wrong");
					$row=mysqli_fetch_assoc($result);
					$arr[$i]=$path.$row['path'];
				}
				shuffle($arr);
				$sql="SELECT COUNT(id) as cnt FROM comments";
				$result=mysqli_query($link,$sql) or die("query is wrong");
				$row=mysqli_fetch_assoc($result);
				$ccount=$row['cnt'];
				for($i=0;$i<$ccount;$i++)
				{
					$sql="SELECT * FROM comments where ID=".($i+1);
					$result=mysqli_query($link,$sql) or die("query is wrong");
					$row=mysqli_fetch_assoc($result);
					$carr[$i]=$row['comments'];
				}
				shuffle($carr);				
				$cnt=$ccnt=0;
				?>
                <?php
				for($j=0;$j<(int)($count/30);$j++)				 
				{
					$content='<div class="temp_cont">';
					$content.='<div class="small_box"><img class="img-responsive" src="'.$arr[$cnt++].'"/></div>';
					$content.='<div class="small_box" style="margin:125px 0px 0px 0px;"><img class="img-responsive" src="'.$arr[$cnt++].'"/></div>';
					$content.='<div class="medium_box" style="margin:0px 0px 0px 125px"><div class="quot"><i><font color="#999">"</font>'.$carr[$ccnt++].'<font color="#999">"</font></i></div></div>';
					$content.='<div class="small_box" style="margin:0px 0px 0px 375px"><img class="img-responsive" src="'.$arr[$cnt++].'"/></div>';
					$content.='<div class="small_box" style="margin:125px 0px 0px 375px"><img class="img-responsive" src="'.$arr[$cnt++].'"/></div>';
					$content.='<div class="small_box" style="margin:0px 0px 0px 500px"><img class="img-responsive" src="'.$arr[$cnt++].'"/></div>';
					$content.='<div class="small_box" style="margin:125px 0px 0px 500px"><img class="img-responsive" src="'.$arr[$cnt++].'"/></div>';
					$content.='<div class="large_box" style="margin:0px 0px 0px 625px"><img class="img-responsive" src="'.$arr[$cnt++].'"/></div>';
					$content.='<div class="large_box" style="margin:250px 0px 0px 0px"><img class="img-responsive" src="'.$arr[$cnt++].'"/></div>';
					$content.='<div class="medium_box" style="margin:250px 0px 0px 375px"><img class="img-responsive" src="'.$arr[$cnt++].'"/></div>';    
					$content.='<div class="small_box" style="margin:375px 0px 0px 625px"><img class="img-responsive" src="'.$arr[$cnt++].'"/></div>';
					$content.='<div class="small_box" style="margin:375px 0px 0px 750px"><img class="img-responsive" src="'.$arr[$cnt++].'"/></div>';        
					$content.='<div class="small_box" style="margin:375px 0px 0px 875px"><img class="img-responsive" src="'.$arr[$cnt++].'"/></div>';
					$content.='<div class="small_box" style="margin:500px 0px 0px 375px"><img class="img-responsive" src="'.$arr[$cnt++].'"/></div>';             
					$content.='<div class="medium_box" style="margin:500px 0px 0px 500px"><div class="quot"><i><font color="#999">"</font>'.$carr[$ccnt++].'<font color="#999">"</font></i></div></div>';
					$content.='<div class="small_box" style="margin:500px 0px 0px 750px"><img class="img-responsive" src="'.$arr[$cnt++].'"/></div>';
					$content.='<div class="small_box" style="margin:500px 0px 0px 875px"><img class="img-responsive" src="'.$arr[$cnt++].'"/></div>';                               
					$content.='<div class="medium_box" style="margin:625px 0px 0px 0px"><div class="quot"><i><font color="#999">"</font>'.$carr[$ccnt++].'<font color="#999">"</font></i></div></div>';
					$content.='<div class="small_box" style="margin:625px 0px 0px 250px"><img class="img-responsive" src="'.$arr[$cnt++].'"/></div>';
					$content.='<div class="small_box" style="margin:625px 0px 0px 375px"><img class="img-responsive" src="'.$arr[$cnt++].'"/></div>';
					$content.='<div class="small_box" style="margin:625px 0px 0px 750px"><img class="img-responsive" src="'.$arr[$cnt++].'"/></div>';                                
					$content.='<div class="small_box" style="margin:625px 0px 0px 875px"><img class="img-responsive" src="'.$arr[$cnt++].'"/></div>';
					$content.='<div class="large_box" style="margin:750px 0px 0px 250px"><img class="img-responsive" src="'.$arr[$cnt++].'"/></div>';                               
					$content.='<div class="small_box" style="margin:750px 0px 0px 625px"><img class="img-responsive" src="'.$arr[$cnt++].'"/></div>';
					$content.='<div class="medium_box" style="margin:750px 0px 0px 750px"><img class="img-responsive" src="'.$arr[$cnt++].'"/></div>';
					$content.='<div class="small_box" style="margin:875px 0px 0px 625px"><img class="img-responsive" src="'.$arr[$cnt++].'"/></div>';
					$content.='<div class="small_box" style="margin:1000px 0px 0px 625px"><img class="img-responsive" src="'.$arr[$cnt++].'"/></div>';
					$content.='<div class="small_box" style="margin:1000px 0px 0px 750px"><img class="img-responsive" src="'.$arr[$cnt++].'"/></div>';
					$content.='<div class="small_box" style="margin:1000px 0px 0px 875px"><img class="img-responsive" src="'.$arr[$cnt++].'"/></div>';
					$content.='<div class="small_box" style="margin:875px 0px 0px 0px"><img class="img-responsive" src="'.$arr[$cnt++].'"/></div>';
					$content.='<div class="small_box" style="margin:875px 0px 0px 125px"><img class="img-responsive" src="'.$arr[$cnt++].'"/></div>';
					$content.='<div class="small_box" style="margin:1000px 0px 0px 0px"><img class="img-responsive" src="'.$arr[$cnt++].'"/></div>';
					$content.='<div class="small_box" style="margin:1000px 0px 0px 125px"><img class="img-responsive" src="'.$arr[$cnt++].'"/></div>';
					$content.='</div>';
					echo $content;
				}
				mysqli_close($link);					
				?>  
    	</div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
    </div>
    
</font>
</b>
</body>




</html>