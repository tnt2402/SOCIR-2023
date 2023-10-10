<?php       
include_once('config/config.php');

            $sv = "SELECT * FROM `jp_students` LIMIT 4";
            $chay = mysqli_query($conn, $sv);
            $d = 0;
            $a = '[';
            while($diem = mysqli_fetch_assoc($chay)){
                $d++;
                $diemtb = $diem['point_Total']/8;
                $id = $diem['fullName'];

                $a = $a.'\''.$id.'\''.','.$diemtb.']';
                if($d < 4){
                    $a = $a.',[';
                }
            }   
            $a = '['.$a.']'; 
            echo $a;

?>