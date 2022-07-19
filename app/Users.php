<?php

namespace app;

use FaaPz\PDO\Clause\Conditional;

class Users extends Db {

    public $users, $companies;

    public function loadAll() {
        $this->users = $this->database->select()->from('users')
        ->execute()->fetchAll();

        return $this;
    }

    public function get() {
        return $this->users;
    }

    public function find($userid)    {
        $this->users = $this->database->select()->from('users')->where(new Conditional("id", "=", $userid))->execute()->fetch();
    }

    public function update($kvs, $condition = null) {

        $query = $this->database->update($kvs)->table('users');

        is_null($condition) ? 
        $query->where(new Conditional("id", "=", $this->users['id'])) :
        $query->where($condition);

        $query->execute();
    }

    public function delete($usrid)
    {
        $this->database->delete()->from('users')->where(new Conditional("id", "=", $usrid))->execute();
    }

    public function create($firstName, $lastName, $companyName, $companyPhoneNumber) {

        $insert = $this->database->insert()
        ->into('users')
        ->columns(
            'first_name',
            'last_name',
            'company_name',
            'company_phone_number'
        )
        ->values(
            $firstName,
            $lastName,
            $companyName,
            $companyPhoneNumber
        )->execute();
    }

    public function getCompanies(){

        $companies = [];

        foreach ($this->users as $user) {
            $companies[$user['company_name']] = [
                'company_name' => $user['company_name'],
                'company_phone_number' => $user['company_phone_number']
            ];
        }

        return $companies;
    }

}
