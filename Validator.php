<?

namespace Validators;

class Validator
{

    public static function valid(array $data): array
    {

        //normalize data so I know what I have and where I have it.
        $validData = [
            "fName" => null,
            "lName" =>  null,
            "company" =>  $data['company'],
            "email" => null,
            "phone" =>  null,
            "extension" =>  null,
            "address" =>  $data['address'],
            "username" =>  $data['username'],
            "website" =>  $data['website']
        ];

        // I can use !filter_var($email, FILTER_VALIDATE_EMAIL) here but was asked for a basic regex check
        if (isset($data['email'])) {
            $regex = '/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/';
            if (preg_match($regex, $data["email"])) {
                $validData["email"] = strtolower($data["email"]);
            }
        }

        //get extension and normalize phone and extension
        if (isset($data["phone"])) {
            $phone = $data["phone"];
            $pos = strpos($data["phone"], "x");
            if ($pos > 0) {
                $extension = substr($data["phone"], $pos);
                $phone = substr($data["phone"], 0, $pos);
                $validData["extension"] = trim(preg_replace('/[^0-9]/', '', $extension));
            }
            $validData["phone"] = trim(preg_replace('/[^0-9]/', '', $phone));
        }

        //get first and last name from single string
        if (isset($data["name"])) {
            $name = explode(" ", $data['name']);
            $titles = array('Mr.', 'Mrs.', 'Miss.', 'Dr.');

            $validData["fName"] = $name[0];
            $validData["lName"] = $name[1];

            if (in_array($name[0], $titles)) {
                $validData["fName"] = "{$name[0]} {$name[1]}";
                $validData["lName"] = $name[2];
            }
        }

        return $validData;
    }
}