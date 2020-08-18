<?php
class UploadersRepository extends DbRepository
{
    public function insert($username)
    {

        $now = new DateTime();


        $sql = "insert into uploaders(username, created_at)
                values(:username, :created_at)";


         $stmt = $this->execute($sql, array(
             ':username' => $username,
             ':created_at' => $now->format('Y-m-d H:i:s'),
         ));

    }
}