<?

namespace Users;

use Users\User;

class Users
{

    private array $users = [];

    public function __construct()
    {
    }

    public function addUser(User $user)
    {
        $this->users[] = $user;
    }

    public function getUsers(): array
    {
        return $this->users;
    }

    private function getHeaders(): array
    {
        return  [
            "name" => "name",
            "email" => "email",
            "phone" => "phone",
            "city" => "city"
        ];
    }

    public function printUsers(): void
    {
        print_r(implode(",", $this->getHeaders()) . "\r\n");

        $users = $this->getUsers();

        foreach ($users as $user) {
            print_r(implode(",", $user->toArray()) . "\r\n");
        }
    }
}
