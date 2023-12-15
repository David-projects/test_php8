<?

include "./Users.php";
include "./User.php";
include "./Validator.php";
include "./testData.php";

//use Users\Users as users;
//use Users\User as user;
use Users\Users;
use Users\User;
use Validators\Validator;


// $curl = curl_init();

// curl_setopt_array($curl, array(
//     CURLOPT_URL => 'https://jsonplaceholder.typicode.com/users',
//     CURLOPT_CUSTOMREQUEST => 'GET',
//     CURLOPT_RETURNTRANSFER => true,
// ));

// $userDataJson = curl_exec($curl);

$userDataJson = $data;

$userData = json_decode($userDataJson, true);


$users = new Users();

if (isset($userData)) {
    foreach ($userData as $data) {
        $users->addUser(new User(Validator::valid($data)));
    }
}

print_r($users->printUsers());
