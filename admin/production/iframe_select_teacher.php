<?php include "config.php";
$te="SELECT * FROM `teachers` WHERE `t_id`='$_GET[t_id]'";
$rff=$con->query($te);
$ft=$rff->fetch_assoc();

if($ft[balance]<100000)
{
?>
<!DOCTYPE html>
<html>
    <head>
        <style>
        input[type=text], select {
          width: 100%;
          padding: 12px 20px;
          margin: 8px 0;
          display: inline-block;
          border: 1px solid #ccc;
          border-radius: 4px;
          box-sizing: border-box;
        }
        
        input[type=submit] {
          width: 100%;
          background-color: #4CAF50;
          color: white;
          padding: 14px 20px;
          margin: 8px 0;
          border: none;
          border-radius: 4px;
          cursor: pointer;
        }
        
        input[type=submit]:hover {
          background-color: #45a049;
        }
        
        div {
          border-radius: 5px;
          background-color: #f2f2f2;
          padding: 20px;
        }
        </style>
        <script>
            function showResult(str) {
              if (str=="") {
                document.getElementById("class").innerHTML="";
                document.getElementById("tow").innerHTML="";
                return;
              }
              var xmlhttp=new XMLHttpRequest();
              xmlhttp.onreadystatechange=function() {
                if (this.readyState==4 && this.status==200) {
                  document.getElementById("class").innerHTML=this.responseText;
                }
              }
              xmlhttp.open("GET","fetch_class.php?q="+str,true);
              xmlhttp.send();
              
              //////////////////for selecting type of work
              
              
              var xmlhttp=new XMLHttpRequest();
              xmlhttp.onreadystatechange=function() {
                if (this.readyState==4 && this.status==200) {
                  document.getElementById("tow").innerHTML=this.responseText;
                }
              }
              xmlhttp.open("GET","fetch_tow.php?q="+str,true);
              xmlhttp.send();
            }
            
            function showsem(str) {
              if (str=="") {
                document.getElementById("sem").innerHTML="";
                
                return;
              }
              var xmlhttp=new XMLHttpRequest();
              xmlhttp.onreadystatechange=function() {
                if (this.readyState==4 && this.status==200) {
                  document.getElementById("sem").innerHTML=this.responseText;
                }
              }
              xmlhttp.open("GET","fetch_semester.php?q="+str,true);
              xmlhttp.send();
            }
            
            function showtowp(str) {
              if (str=="") {
                document.getElementById("towp").innerHTML="";
                
                return;
              }
              var xmlhttp=new XMLHttpRequest();
              xmlhttp.onreadystatechange=function() {
                if (this.readyState==4 && this.status==200) {
                  document.getElementById("towp").innerHTML=this.responseText;
                }
              }
              xmlhttp.open("GET","fetch_tow_price.php?q="+str,true);
              xmlhttp.send();
            }
            
            function showold(str,t_id) {
              if (str=="") {
                document.getElementById("pre").innerHTML="";
                
                return;
              }
              var xmlhttp=new XMLHttpRequest();
              xmlhttp.onreadystatechange=function() {
                if (this.readyState==4 && this.status==200) {
                  document.getElementById("pre").innerHTML=this.responseText;
                }
              }
              xmlhttp.open("GET","fetch_old_bill_d.php?q=" + str + "&t_id=" + t_id,true);
              xmlhttp.send();
            }
        </script>
    </head>
<body>

<h3>Cut Bill</h3>


  <form action="iframe_confirm_bill_detail.php" method="post">
      <input type="hidden" name="t_id" value="<?php echo $_GET[t_id];?>">
      <input type="hidden" name="s_code" value="<?php echo $_GET[s_id];?>">
 <div>
    <label for="fname">Select Course</label>
    <select class="form-control " name="course_id" autofocus onchange="showResult(this.value)" required>
        <option></option>
        <?php 
        $ey="SELECT * FROM `course`";
        $rf=$con->query($ey);
        while($f=$rf->fetch_assoc())
        {
        ?>
        <option value="<?php echo $f[c_id];?>"><?php echo $f[name];?></option>
        <?php }?>
    </select>
 </div>  
 <div> 
   <label for="fname">Select Class</label>
    <select name="class_id" id="class" onchange="showsem(this.value)" required>
        <option></option>
    </select>
 </div>  
 <div> 
   <label for="fname">Select Semester</label>
    <select name="sem_id" id="sem" required>
        <option></option>
    </select>
 </div>  
<div>    
    <label for="fname">Select Type of Work</label>
    <select name="tow_id" id="tow" onchange="showtowp(this.value)" required>
    </select>
</div>  
<div>    
    <label for="fname">Add Description</label>
    <input type="text" name="description" autocomplete="off" onkeyup="showold(this.value,<?php echo $_GET[t_id];?>)">
</div>
<div id="pre"></div>
<div>    
    <label for="fname">Qty</label>
    <input type="text" name="qty" autocomplete="off">
</div>

<div>    
<span id="towp"></span>

    <input type="submit" value="Submit" name="submit_bill">
  </form>
</body>
</html>
<?php }
else{
    echo "";
}
?>
