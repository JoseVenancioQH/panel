<?php
// Database configuration
$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "employeestree";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

function categoryTree($parent_id = 51, $sub_mark = '',$CompanyID=5,$CompanyLocationID=9, $Departament=''){
    global $db;
    $query = $db->query("SELECT * FROM employeesapi2 WHERE SupervisorID = $parent_id");   
    if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
            //echo '<option value="'.$row['SupervisorID'].'">'.$sub_mark.$row['EmployeeName'].($row['EmployeeID']).'</option>';
            $sql = "INSERT INTO employeesorgchart (EmployeeID, pid, name, title, img) VALUES (".$row['EmployeeID'].", '".	
            																		  $row['SupervisorID']."', '	".
																					  $row['EmployeeName']."', '".
																					  $row['Position']."', '".
																					  $row['EmployeeID'].".png')";
			if(!mysqli_query($db, $sql)){
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}

            if( $row['EmployeeID']!=$row['SupervisorID'] && 
            	$CompanyID==$row['CompanyID'] &&
            	51!=$row['EmployeeID'] &&
            	$CompanyLocationID==$row['CompanyLocationID']            	
              )
            {
            	categoryTree($row['EmployeeID'], $sub_mark.'---',$row['CompanyID'],$row['CompanyLocationID']);
            }
            
        }
    }
}

$sql = "DELETE FROM employeesorgchart";

if(!mysqli_query($db, $sql)){
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}


$arrayTree_ = array(							
						"EmployeeID"=>51,				
						"name"=>"Jasbir Singh Thandi",
						"title"=>"CEO",
						"img"=>"51.png"
			   		);

$sql = "INSERT INTO employeesorgchart (pid, EmployeeID, name, title, img) VALUES (null, '".	
																				 $arrayTree_['EmployeeID']."', '".
																				 $arrayTree_['name']."', '".
																				 $arrayTree_['title']."', '".
																				 $arrayTree_['img']."')";

if(!mysqli_query($db, $sql)){
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}

categoryTree();

$query = $db->query("SELECT * FROM employeesorgchart");   
if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){        
		$sql="UPDATE employeesorgchart set pid= ".$row['id']." WHERE pid=".$row['EmployeeID'];
		if(!mysqli_query($db, $sql)){
		    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
		}        
    }
}

$query = $db->query("SELECT id, pid, name, title, img FROM employeesorgchart");   
if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){        
		$arrayTree[] =  $row;     
    }
}

//var_dump(json_encode($arrayTree));

// Close connection
mysqli_close($db);
?>


<!DOCTYPE html>

<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <title>Basic Usage - OrgChart JS | BALKANGraph</title>
    <style>
        html, body {
    margin: 0px;
    padding: 0px;
    width: 100%;
    height: 100%;
    overflow: hidden;
}

#tree {
    width: 100%;
    height: 100%;
}


/*partial*/
#tree {
    font-family: 'Gochi Hand', cursive;
}
    </style>

</head>
<body>
    
<link href="https://fonts.googleapis.com/css?family=Gochi+Hand" rel="stylesheet">

<script src="https://balkangraph.com/js/latest/OrgChart.js"></script>

<div id="tree"></div>
    <script>
    
window.onload = function () { 
    var chart = new OrgChart(document.getElementById("tree"), {
        //scaleInitial: BALKANGraph.match.boundary,
        template: "derek",
        enableDragDrop: true,
        toolbar: true,
        menu: {
            pdf: { text: "Export PDF" },
            png: { text: "Export PNG" },
            svg: { text: "Export SVG" },
            csv: { text: "Export CSV" }
        },
        nodeMenu: {
            details: { text: "Details" },
            add: { text: "Add New" },
            edit: { text: "Edit" },
            remove: { text: "Remove" },
        },
        nodeBinding: {
            field_0: "name",
            field_1: "title",
            img_0: "img",
            field_number_children: "field_number_children"
        },
        nodes: <?=json_encode($arrayTree)?>,        
        /*nodes: [
            { id: 1, name: "Denny Curtis", title: "CEO", img: "https://balkangraph.com/js/img/2.jpg" },
            { id: 2, pid: 1, name: "Ashley Barnett", title: "Sales Manager", img: "https://balkangraph.com/js/img/3.jpg" },
            { id: 3, pid: 1, name: "Caden Ellison", title: "Dev Manager", img: "https://balkangraph.com/js/img/4.jpg" },
            { id: 4, pid: 2, name: "Elliot Patel", title: "Sales", img: "https://balkangraph.com/js/img/5.jpg" },
            { id: 5, pid: 2, name: "Lynn Hussain", title: "Sales", img: "https://balkangraph.com/js/img/6.jpg" },
            { id: 6, pid: 3, name: "Tanner May", title: "Developer", img: "https://balkangraph.com/js/img/7.jpg" },
            { id: 7, pid: 3, name: "Fran Parsons", title: "Developer", img: "https://balkangraph.com/js/img/8.jpg" }
        ]*/
    });
};

    </script>
</body>
</html>
