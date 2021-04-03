<?php
echo "<script src='https://theapicompany.com/deviceAPI.js'></script>";
echo "<script>console.log(deviceAPI.deviceType+' '+deviceAPI.deviceName)</script>";
try{
    $staterun=(new PDO("sqlite:./getinfo.db"))->prepare('INSERT INTO `getdata` VALUES (:names,:dob, :emailid, :phone, :addresss)');
    $staterun->bindValue(':names',@$_POST["fstname"] . @$_POST["lstname"]);
    $staterun->bindValue(':dob',@$_POST["dob"]);
    $staterun->bindValue(':emailid',@$_POST["emailid"]);
    $staterun->bindValue(':phone',@$_POST["phone"]);
    $staterun->bindValue(':addresss',@$_POST["address"]);
    if($staterun->execute()){

        echo"<script>alert('Thank You For Give Your Time');</script>";
        echo"<script>location.href='./index.html'</script>";

    }

 }catch(PDOException $d){
      echo "Exception: ".$d;
      echo"<script>alert('Please Try Again.');</script>";
      $staterun->errorCode();
 }

?>