<?php


namespace Dao;


class User extends Dbh {

    public function __construct() {
        parent::__construct();
    }

    private function validate(\Model\User $user) {

        if(empty($user->getName()) || empty($user->getEmail()) || empty($user->getPassword())) {

            return [
                "error" => "please fill all the required fields!"
            ];

        }else if(!preg_match("/^[a-zA-Z0-9]*$/", $user->getName())){

            return [
                "error" => "user name not allowed!"
            ];

        }else if(!filter_var($user->getEmail(), FILTER_VALIDATE_EMAIL)) {

            return [
                "error" => "invalid email!"
            ];

        }

    }

    public function save(\Model\User $user) {

        $this->validate($user);

        $sql = "insert into users(name, email, password, created_at) values(?, ?, ?, ?)";
        $hashedPassword = password_hash($user->getPassword(), PASSWORD_DEFAULT);

        $createdAt = $this->dateTime->format("Y-m-d H:i:s");

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user->getName(), $user->getEmail(), $hashedPassword, $createdAt]);

        return [
           "message" => "user registered successfully!"
        ];

    }

    public function update(\Model\User $user) {

        if (empty($user->getId())) return ["error" => "the id not found on the url query param"];
        $this->validate($user);

        $sql = "update users set name = ?, email = ?, password = ? where id = ?";
        $hashedPassword = password_hash($user->getPassword(), PASSWORD_DEFAULT);

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user->getName(), $user->getEmail(), $hashedPassword, $user->getId()]);

        return [
            "message" => "user updated successfully!"
        ];

    }

    public function delete($id) {

        if (empty($id)) return ["error" => "the id not found on the url query param"];

        $sql = "delete from users where id = ?";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);

        return [
            "message" => "user deleted successfully!"
        ];

    }

    public function read() {

        $sql = "select * from users";
        $stmt = $this->connect()->query($sql);
        $stmt->execute();

        while($user = $stmt->fetchObject()) {
            yield $user;
        }

    }


}