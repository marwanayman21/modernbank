<?php
    include 'connect.php';
    $ID=$_GET['UID'];
    $sql = "SELECT * FROM `accholders` where ID=$ID";
    $result = mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    $ID=$row['ID'];
    $Name=$row['Name'];
    $Address=$row['Address']; 
    $Balance=$row['Balance'];
    $BranchName=$row['Branch'];

    if(isset($_POST['update'])){
        $ID=$_POST['ID'];
        $Name=$_POST['Name'];
        $Address=$_POST['Address']; 
        $Balance=$_POST['Balance'];
        $BranchName=$_POST['Branchename'];

        $sql = "update accholders set ID=$ID,Name='$Name',Address='$Address',Balance=$Balance,Branch='$BranchName'where ID=$ID";
        $result=mysqli_query($con,$sql);
        if(!$result){
            die(mysqli_error($con));
        }header("Location:addaccount.php");
    }?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>USERS</title>
</head>

<body>
    <div class="nevbar">
        <div class="logo">
            <a><h1><span>MF</span> Bank</h1></a>
        </div>
        <div class="menu" > 
            <ul>
                <li><a  href="index.php">Home</a></li>
                <li><a  href="add_branch.php">Add/View Branches</a></li>
                <li><a  href="addaccount.php">Add/View Account</a></li>
            </ul> 
        </div>
    </div> 

    <div class="cover"></div>


    <div id="add-account" class="add-account-section">
        <div class="create">
            <h1>ADD ACCOUNT</h1>
            <div class="createUser">
                <div>
                    <img src="account.png" alt="user image" style="width: 250px;height: 250px;">
                </div>
                <div class="userdata">
                    <!-- Create user Form -->
                    <form method="POST" id="accountform">
                        <input id="IDA" type="number" placeholder="ID" name="ID" required value=<?php echo $ID;?>>
                        <input id="NameA" type="text" placeholder="Name" name="Name" required value=<?php echo $Name;?>>
                        <input id="Address" type="text" placeholder="Address" name="Address" required value=<?php echo $Address;?>>
                        <input id="Balance" type="number" placeholder="Balance" name="Balance" required value=<?php echo $Balance;?>>
                        <input id="Branchename" type="text" placeholder="Branchename" name="Branchename" required value=<?php echo $BranchName;?>>
                        <button id="addA"name="update">UPDATE</button>
                    </form>
                </div>
            </div>
        </div>    
</div>
    <div id="view-accounts" class="view-accounts-section">   
    <h1 style="margin-top:4%;letter-spacing: 2px;">ALL  ACCOUNTS</h1>
    <div class="all_users" style="height: 500px;margin-top:4% auto;">
        <input onkeyup="searchdatah(this.value)" id="searchbarA" class="searchbar" placeholder="Search by Name" name="Search" required>        
        <table><thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>ADDRESS</th>
                <th>BALANCE</th>
                <th>BRANCHENAME</th>
                <th>UPDATE</th>
                <th>DELETE</th>   
            </tr></thead>
            <tbody id="tbodyh">  
            <?php
                include 'connect.php';
                $sql = "SELECT * FROM `accholders`";
                $result = mysqli_query($con,$sql);
                if($result){
                    while($row=mysqli_fetch_assoc($result)){
                        $ID=$row['ID'];
                        $Name=$row['Name'];
                        $Address=$row['Address']; 
                        $Balance=$row['Balance'];
                        $BranchName=$row['Branch'];
                        echo'
                        <tr>
                            <td>'.$ID.'</td>
                            <td>'.$Name.'</td>
                            <td>'.$Address.'</td>
                            <td>'.$Balance.'</td>
                            <td>'.$BranchName.'</td>
                            <td><button class="tbutton" onclick="updateholders(${i})" id="updateh"><a class ="a" href ="updatea.php?UID='.$ID.'">Update</a></button></td>
                            <td><button class="tbutton" onclick="deleteholders(${i})" id="deleteh"><a class="a" href ="addaccount.php?ID='.$ID.'">Delete</a></button></td>
                        </tr>';
                    }   
                }
                if(isset($_GET['ID'])){
                    $ID=$_GET['ID'];

                    $sql="delete from `accholders` where ID=$ID";
                    $result=mysqli_query($con,$sql);

                    if(!$result){
                        die(mysqli_error($con));
                    }header("Location:addaccount.php");
                }
            ?>
        </tbody> 
    </table>
    </div>
    </div>
    <!--<script src=scriptaccount.js></script>-->
</body>

</html>