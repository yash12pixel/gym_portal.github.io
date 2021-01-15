<?php
include '../connection.php';
//session_start();
$gym_id=$_SESSION['Gym_ID'];
//Getting merchant data from database
$GymOwnersql="select * from gym_owner go inner join gyms g on go.gym_owner_id=g.gym_owner_id where gym_id=$gym_id";
$GO_res= mysqli_query($con, $GymOwnersql);
$GO_result = mysqli_fetch_array($GO_res);
$Gym_owner_id= $GO_result['gym_owner_id'];
$sql1 = "SELECT AES_DECRYPT(Merchant_key,'shaktiman'),AES_DECRYPT(Merchant_ID,'shaktiman') FROM gym_owner as g inner join gyms as gm on g.gym_owner_id=gm.gym_owner_id where g.gym_owner_id='$Gym_owner_id'";
$result1= mysqli_query($con,$sql1) or die(mysqli_error($con)); 
$rows1 = mysqli_fetch_array($result1);
$merchant_key=$rows1[0];
$merchant_ID=$rows1[1];
/*

- Use PAYTM_ENVIRONMENT as 'PROD' if you wanted to do transaction in production environment else 'TEST' for doing transaction in testing environment.
- Change the value of PAYTM_MERCHANT_KEY constant with details received from Paytm.
- Change the value of PAYTM_MERCHANT_MID constant with details received from Paytm.
- Change the value of PAYTM_MERCHANT_WEBSITE constant with details received from Paytm.
- Above details will be different for testing and production environment.

*/
define('PAYTM_ENVIRONMENT', 'TEST'); // PROD
define('PAYTM_MERCHANT_KEY',"$merchant_key"); //Change this constant's value with Merchant key downloaded from portal
define('PAYTM_MERCHANT_MID',"$merchant_ID");//Change this constant's value with MID (Merchant ID) received from Paytm
define('PAYTM_MERCHANT_WEBSITE', 'WEBSTAGING'); //Change this constant's value with Website name received from Paytm

//define('PAYTM_MERCHANT_KEY', 'QXe#Y#QmwByOUMBn');
//define('PAYTM_MERCHANT_MID', 'ZEfTpb65794729277264');

/*$PAYTM_DOMAIN = "pguat.paytm.com";
if (PAYTM_ENVIRONMENT == 'PROD') {
	$PAYTM_DOMAIN = 'secure.paytm.in';
}

define('PAYTM_REFUND_URL', 'https://'.$PAYTM_DOMAIN.'/oltp/HANDLER_INTERNAL/REFUND');
define('PAYTM_STATUS_QUERY_URL', 'https://'.$PAYTM_DOMAIN.'/oltp/HANDLER_INTERNAL/TXNSTATUS');
define('PAYTM_STATUS_QUERY_NEW_URL', 'https://'.$PAYTM_DOMAIN.'/oltp/HANDLER_INTERNAL/getTxnStatus');
define('PAYTM_TXN_URL', 'https://'.$PAYTM_DOMAIN.'/oltp-web/processTransaction');*/

$PAYTM_STATUS_QUERY_NEW_URL='https://securegw-stage.paytm.in/order/status';
$PAYTM_TXN_URL='https://securegw-stage.paytm.in/order/process';

define('PAYTM_REFUND_URL', '');
define('PAYTM_STATUS_QUERY_URL', $PAYTM_STATUS_QUERY_NEW_URL);
define('PAYTM_STATUS_QUERY_NEW_URL', $PAYTM_STATUS_QUERY_NEW_URL);
define('PAYTM_TXN_URL', $PAYTM_TXN_URL);

?>
