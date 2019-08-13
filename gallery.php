<?php

if(isset($_POST["name"]))
{
    $filename = $folder_name.$_POST["name"];
    unlink($filename);

    include("mysqli_connect.php"); 
    $id = $_POST["id"];
    $sql = "DELETE FROM contents WHERE content_id = '".$id."'";
    $conn->query($sql);

    //re order
    $sql = "SELECT content_id FROM contents ORDER BY content_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $reorder = 0;
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $reorder++;
            $id = $row['content_id'];
            $sql = "UPDATE contents SET content_order = '".$reorder."' WHERE content_id = '".$id."'";
            $conn->query($sql);
        }
    }
    $conn->close();
}

$output = '<div class="row">';

include("mysqli_connect.php");

$sql = "SELECT content_id, content_order, content_name, content_type, content_url FROM contents ORDER BY content_order";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $id = $row['content_id'];
        $order = $row['content_order'];
        $filename = $row['content_name'];
        $filenameExt = $row['content_name'] . '.' . $row['content_type'];
        $filepath = $row['content_url'] . $row['content_name'] . "." . $row['content_type'];

        $output .= '
        <div class="col-md-55">
            <div class="thumbnail">
                <div class="image view view-first">
                    <img style="width: 100%; display: block;" src="'.$filepath.'" alt="image" />
                </div>
                <div class="caption">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6" align="left">
                            <p>'.$order.'.'.$filenameExt.'</p>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6" align="right">
                            <button type="button" class="btn btn-danger btn-xs remove_image" id="'.$id.'" value="'.$filename.'">
                                <i class="fa fa-close"></i> ลบ
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ';
    }
}

$output .= '</div>';
echo $output;

?>