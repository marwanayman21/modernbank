<?php
    include 'connect.php';
    if(isset($_POST['addb'])){
        $ID=$_POST['ID'];
        $Name=$_POST['Name'];
        $Manager=$_POST['Manager'];

        $sql = "insert into branches(ID,Name, Manager) values ('$ID','$Name', '$Manager')";
        $result=mysqli_query($con,$sql);
        if(!$result){
            die(mysqli_error($con));
        }header("Location: add_branch.php");
    }?>
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
                    <input id="IDB" type="number" placeholder="ID" name="ID" required>
                    <input id="NameB" type="text" placeholder="Name" name="Name" required>
                    <input id="Manager" type="text" placeholder="Manager" name="Manager" required>
                    <button id="addb" name="addb">ADD BRANCH</button>
                 </form>
            </div>
        </div>
        </div>
        <div id="branches" class="branches-section">
            <h1 style="margin-top:4%;letter-spacing: 2px;">ALL BRANCHES</h1>
            <div class="all_users" style="height: 500px;margin-top:4% auto;">
<input onkeyup="searchData(this.value)" id="searchbar" class="searchbar" placeholder="Search by Name" name="Search" required>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>Manager</th>
            <th>UPDATE</th>
            <th>DELETE</th>
        </tr>
    </thead>
    <tbody id="tbodyb">
        <?php
        include 'connect.php';
        $sql = "SELECT * FROM `branches`";
        $result = mysqli_query($con, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $ID = $row['ID'];
                $Name = $row['Name'];
                $Manager = $row['Manager'];
                echo '
                <tr>
                    <td>' . $ID . '</td>
                    <td>' . $Name . '</td>
                    <td>' . $Manager . '</td>
                    <td><button class="tbutton"><a class="a" href="updateb.php?UID=' . $ID . '">Update</a></button></td>
                    <td><button class="tbuttond"><a class="a" href="add_branch.php?DID=' . $ID . '">Delete</a></button></td>
                </tr>';
            }
        }
        if(isset($_GET['DID'])){
            $ID=$_GET['DID'];

            $sql="delete from branches where ID=$ID";
            $result=mysqli_query($con,$sql);

            if(!$result){
                die(mysqli_error($con));
            }header("Location: add_branch.php");
        }
        ?>
    </tbody>
</table>
<script>
    function searchData() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchbar");
        filter = input.value.toUpperCase();
        table = document.getElementById("tbodyb");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }}
        }
    }
</script>

            </div>    
        </div>
       

    <!--<script src="scriptbranch.js"></script>-->
</body>

</html>