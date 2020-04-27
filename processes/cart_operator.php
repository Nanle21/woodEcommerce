<?php
    session_start();
    include_once("../Admin/db/config.php");
    include_once("../Admin/functions.php");
    
    $acc_id = isset($_SESSION['acc_id']) ? $_SESSION['acc_id']: '';
    $p_id = isset($_POST['p_id']) ? $_POST['p_id']: '';
    $action = isset($_POST['action']) ? $_POST['action']: '';
    $qty = isset($_POST['qty']) ? $_POST['qty']: '';
    


    if($acc_id == ""){
        if($client_id == ""){
            if(isset($_SESSION['client_id'])){
                $client_id = $_SESSION['client_id'];
            }
            elseif(isset($_COOKIE['client_id']))
            {
                 $client_id = $_COOKIE['client_id'];
                 setcookie('client_id', $client_id, time() + 604800);
            }
            else{
                $client_id = md5(uniqid(rand(), true));
                $_SESSION['client_id'] = $client_id;

                setcookie('client_id', $client_id, time() + 604800);
            }
        }
    

    switch ($action) {
        case 'add':
            if($qty != ""){
                $value = array('p_id'=>$p_id,'client_id'=>$client_id,'quantity'=>$qty);
                $add_cart = table_add_record("cart",$value,__FILE__,__LINE__,"insert");

                if($add_cart!=""){
                    echo "Failed to add to cart";
                    exit();
                }
                else{
                    $_SESSION['p_id'] = $p_id;
                    $_SESSION['client_id'] = $client_id;
                    echo "Added to cart";
                    exit();
                    }
                }
                else{
                $check_cart = $connection->query("SELECT * FROM cart where p_id='$p_id' and client_id='$client_id'");
                $total_cart = $check_cart->rowCount();
                if($total_cart != 0){
                    $newquantity = 1;
                    $total_cart = $check_cart->fetch(PDO::FETCH_ASSOC);
                    $newquantity += $total_cart['quantity'];     
                    $updateRecord = $connection->query("UPDATE cart set quantity='$newquantity' where p_id='$p_id' and client_id='$client_id'");
                        echo "Quantity of cart has been updated";
                        exit();
                }
                else{
                    $value = array('p_id'=>$p_id,'client_id'=>$client_id);
                    $add_cart = table_add_record("cart",$value,__FILE__,__LINE__,"insert");

                    if($add_cart!=""){
                        echo "Failed to add to cart";
                        exit();
                    }
                    else{
                        $_SESSION['p_id'] = $p_id;
                        $_SESSION['client_id'] = $client_id;
                        echo "Added to cart";
                        exit();
                        }
                    }
            }
            
            break;
            
            case 'remove':
                $check_cart = $connection->query("SELECT * FROM cart where p_id='$p_id' and client_id='$client_id'");
                $total_cart = $check_cart->rowCount();
                if($total_cart != 0){
                    $total_cart = $check_cart->fetch(PDO::FETCH_ASSOC);
                    if($total_cart['quantity'] <= 1)
                    {
                         $delete_cart = $connection->query("DELETE FROM cart where p_id='$p_id' and client_id='$client_id'");
                         echo "quantity has been deducted";
                         exit();
                    }
                    else{
                        $newquantity = -1;
                    
                    $newquantity += $total_cart['quantity'];               
                                    $updateRecord = $connection->query("UPDATE cart set quantity='$newquantity' where p_id='$p_id' and client_id='$client_id'");
                                     echo "quantity of items has been deducted";
                         exit();
                    }
        
                }
                else{
                    $delete_cart = $connection->query("DELETE FROM cart where p_id='$p_id' and client_id='$client_id'");
                    if($delete_cart == "false"){
                        echo "Failed to delete";
                        exit();
                    }
                    else{
                        echo "deleted";
                        $_SESSION['p_id'] = $p_id;
                        $_SESSION['client_id'] = $client_id;
                        exit();
                    }
                } 
            break;
        default:
            # code...
            break;
    }
}
else{
    $account_detail = table_open("users","acc_id='$acc_id'","","",__FILE__,__LINE__);
    if($account_detail['error']!="")
    {
        echo "Failed to get user information. Please try again later";
        exit();
    }
    else{
         $acc_id = $account_detail[0]['acc_id'];
         
    }
     if($acc_id != "")
     {
        if($client_id == ""){
            if(isset($_SESSION['client_id'])){
                $client_id = $_SESSION['client_id'];
            }
            elseif(isset($_COOKIE['client_id']))
            {
                $client_id = $_COOKIE['client_id'];
                 setcookie('client_id', $client_id, time() + 604800);
            }
            else{
                $client_id = md5(uniqid(rand(), true));
                $_SESSION['client_id'] = $client_id;

                setcookie('client_id', $client_id, time() + 604800);
            }
        }

        switch ($action) {
            case 'add':
                $check_cart = $connection->query("SELECT * FROM cart where p_id='$p_id' and client_id='$client_id'");
                $total_cart = $check_cart->rowCount();
                if($total_cart != 0){
                     $newquantity = 1;
                    $total_cart = $check_cart->fetch(PDO::FETCH_ASSOC);
                    $newquantity += $total_cart['quantity'];

                    $updateRecord = $connection->query("UPDATE cart set quantity='$newquantity' where p_id='$p_id' and user_id='$acc_id'");
                    echo "quantity of product have been updated";
                    exit();
                }
                else{
                    $value = array('p_id'=>$p_id,'client_id'=>$client_id,'user_id'=>$acc_id);
                    $add_cart = table_add_record("cart",$value,__FILE__,__LINE__,"insert");
                    if($add_cart!=""){
                        echo "Failed to add to cart";  
                    }
                    else{
                        $_SESSION['p_id'] = $p_id;
                        $_SESSION['client_id'] = $client_id;
                        echo "Added to cart";
                        exit();
                    }
                }
                break;
                 
            case 'remove':
                $check_cart = $connection->query("SELECT * FROM cart where p_id='$p_id' and client_id='$client_id' and user_id='$acc_id'");
                $total_cart = $check_cart->rowCount();
                if($total_cart != 0){
                    $total_cart = $check_cart->fetch(PDO::FETCH_ASSOC);
                    if($total_cart['quantity'] <= 1)
                    {
                        $delete_cart = $connection->query("DELETE FROM cart where p_id='$p_id' and client_id='$client_id'");
                    }
                    else{
                    $newquantity = -1;

                    $newquantity += $total_cart['quantity'];               
                    $updateRecord = $connection->query("UPDATE cart set quantity='$newquantity' where p_id='$p_id' and client_id='$client_id'");
                    }
                }
                else{

                    $delete_cart = $connection->query("DELETE FROM cart where p_id='$p_id' and client_id='$client_id'");

                    if($delete_cart == "false"){
                        echo "failed to delete";
                        exit();   
                    }
                    else{
                        $_SESSION['p_id'] = $p_id;
                        $_SESSION['client_id'] = $client_id;
                        echo "Deleted";
                        exit();
                        }
                }

            
            break;                       
            default:
                # code...
                break;
        }
    }


}

?>