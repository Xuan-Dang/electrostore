<?php 
    function db() {
        $con  = new mysqli("localhost", "root", "", "electrostore");
        if($con -> connect_errno) {
            echo "Lỗi kết nối cơ sở dữ liệu";
            exit();
        }
        return $con;
    }
    function find($sql) {
        $con = db();
        $result = $con -> query($sql);
        if(!isset($result) || !$result) return array("code" => 500, "message" => "Lỗi truy vấn cơ sở dữ liệu");
        $data = array();
        foreach($result as $index => $item) {
            array_push($data, $item);
        }
        return array("code" => 200, "message" => "Thành công", "data" => $data);
    }
    function findOne($sql) {
        $con = db();
        $result = $con -> query($sql);
        if(!isset($result) || !$result) return array("code" => 500, "message" => "Lỗi truy vấn cơ sở dữ liệu");
        $data = $result -> fetch_assoc();
        return array("code" => 200, "message" => "Thành công", "data" => $data);
    }
?>