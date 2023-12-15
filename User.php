<?

namespace Users;

class User
{

    // First name of user
    private string $fName;

    //Last name for user
    private string $lName;

    //Comapny the user is with
    private array $company;

    //email address of the user
    private mixed $email;

    //Phone number of the user with out the extension digits only
    private string $phone;

    //Phone extension of the user digits only
    private mixed $extension;

    //City of the user or company
    private string $city;

    //user address
    private array $address;

    //username
    private string $username;

    //company website
    private string $website;


    /**
     * Takes in an array of the user, the user class should take care of the user this includes
     * seting and user up
     * 
     * @param array $user: user to be setup
     */
    public function __construct(array $user)
    {
        $this->fName = $user["fName"];
        $this->lName = $user["lName"];
        $this->company = $user["company"];
        $this->email = $user["email"];
        $this->phone = $user["phone"];
        $this->extension = $user["extension"];
        $this->address = $user["address"];
        $this->username = $user["username"];
        $this->website = $user["website"];
    }

    public function getFirstName(): string
    {
        return $this->fName;
    }

    public function getLastName(): string
    {
        return $this->lName;
    }

    public function getCompany(): array
    {
        return $this->company;
    }

    public function getCompanyName(): mixed
    {
        if (isset($this->company['name'])) {
            return $this->company['name'];
        }
        return null;
    }

    public function getEmail(): mixed
    {
        return $this->email;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getExtension(): mixed
    {
        return $this->extension;
    }

    public function getCity(): mixed
    {
        if (isset($this->address['city'])) {
            return $this->address['city'];
        }
        return null;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getAddress(): array
    {
        return $this->address;
    }


    public function getWebsite(): string
    {
        return $this->website;
    }


    public function toArray(): array
    {
        return [
            "name" => "{$this->getFirstName()} {$this->getLastName()}",
            "email" => $this->getEmail(),
            "phone" => $this->getPhone(),
            "city" => $this->getCity()
        ];
    }
}
