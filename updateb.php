<?php
    include 'connect.php';
    $ID=$_GET['UID'];
    $sql = "SELECT * FROM `branches` where ID=$ID";
    $result = mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    $ID=$row['ID'];
    $Name=$row['Name'];
    $Manager=$row['Manager'];

    if(isset($_POST['update'])){
        $ID=$_POST['ID'];
        $Name=$_POST['Name'];
        $Manager=$_POST['Manager'];

        $sql = "update branches set ID=$ID,Name='$Name',Manager='$Manager' where ID=$ID";
        $result=mysqli_query($con,$sql);
        if(!$result){
            die(mysqli_error($con));
        }header("Location: add_branch.php");
    }
?>
<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="index.css">
        <title>BRANCHES</title>
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
        <div class="create">
            <h1>ADD BRANCHES</h1>
            <div class="createUser">
                <div>
                    <img src="bank.png" alt="user image" style="width: 250px;height: 250px;">
                </div>
                <div class="userdata">
                    <form method="POST" id="branchForm">
                        <input id="IDB" type="number" placeholder="ID" name="ID" required value=<?php echo $ID;?>>
                        <input id="NameB" type="text" placeholder="Name" name="Name" required value=<?php echo $Name;?>>
                        <input id="Manager" type="text" placeholder="Manager" name="Manager" required value=<?php echo $Manager;?>>
                        <button id="addb" name="update">UPDATE</button>
                    </form>
                </div>
            </div>
            </div>
            <div id="branches" class="branches-section">
                <h1 style="margin-top:4%;letter-spacing: 2px;">ALL BRANCHES</h1>
                <div class="all_users" style="height: 500px;margin-top:4% auto;">
                    <input onkeyup="searchdata(this.value)" id="searchbar" class="searchbar" placeholder="Search by Name" name="Search" required>
                    <table><thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>Manager</th>
                            <th>UPDATE</th>
                            <th>DELETE</th>
                        </tr></thead>
                        <tbody id="tbodyb">  
                        <?php
                            include 'connect.php';
                            $sql = "SELECT * FROM `branches`";
                            $result = mysqli_query($con,$sql);
                            if($result){
                                while($row=mysqli_fetch_assoc($result)){
                                    $ID=$row['ID'];
                                    $Name=$row['Name'];
                                    $Manager=$row['Manager'];
                                    echo'
                                    <tr>
                                        <td>'.$ID.'</td>
                                        <td>'.$Name.'</td>
                                        <td>'.$Manager.'</td>
                                        <td><button class="tbutton" onclick="updatedata(${i})" id="update"><a class ="a" href ="updateb.php?UID='.$ID.'">Update</a></button></td>
                                        <td><button class="tbuttond" onclick="deletedata(${i})" id="delete"><a class="a" href ="add_branch.php?DID='.$ID.'">Delete</a></button></td>
                                    </tr>';
                                }
                            }
                            if(isset($_GET['DID'])){
                                $ID=$_GET['DID'];

                                $sql="delete from `branches` where ID=$ID";
                                $result=mysqli_query($con,$sql);

                                if(!$result){
                                    die(mysqli_error($con));
                                }header("Location: add_branch.php");
                            }
                        ?>
                        </tbody>
                    </table>
                </div>    
            </div>
        

        <!--<script src="navscroll.js"></script>-->
    </body>

    </html>