     <?php
       $con = mysqli_connect("localhost","root","","banlaptop");
       $con ->set_charset("utf8");
       if (!$con) {
         die("Connection failed: " . mysqli_connect_error());
     }
     if(isset($_POST['query'])){
         $inpText=$_POST['query'];
         $sql = "select * from laptop where tenlaptop like '%$inpText%' LIMIT 4";
         $result = $con ->query($sql);
         if($result ->num_rows>0){         
             while($row=$result ->fetch_assoc()){
                $format_number_tien = number_format($row['giatien'])    ;
                 echo "<a href='xemsanpham.php?select=".$row['malaptop']."' class='list-group-item list-group-item-action border-1' style='width: 370px;'>
                 <table style='border-bottom:none;'>
                    <tr>
                       <td rowspan='2' style='width: 120px; height: 60px;'><img src='admin/".$row['hinhlaptop']."' style='width: 100px; height: 58px;'></td>
                       <td style='font-weight:bold;width: 220px; height: 35px;'> &nbsp;&nbsp;".$row['tenlaptop']."</td>
                    </tr>
                    <tr>
                       <td style='color:red;width: 200px; height: 35px;'>&nbsp;&nbsp;$format_number_tien đ</td>
                    </tr>
                 </table>
                 </a>";
             }
         }
         else {
             echo "<a  class='list-group-item list-group-item-action border-1' style='width: 300px;'>No result</a>";
         }
     }
?>