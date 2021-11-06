 <?php 
$data =htmlspecialchars($_GET['id']);

            require "admin/connection.php";
           $result = mysqli_query($con,"SELECT pid,pname FROM product_master WHERE pname like '$data%'");
         
           while($r = mysqli_fetch_array($result))
                {
                 echo "<table class='table-hover'>
	                 		<tr>
	                 			<td><a href='mobile_desc.php?pid=$r[0]'>$r[1]</a></td>
	                 		</tr>
                 		</table>";
                 
        }
    ?>