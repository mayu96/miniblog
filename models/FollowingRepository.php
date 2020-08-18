<?php

class FollowingRepository extends DbRepository
{
    //フォローしたユーザを保存する
    public function insert($user_id, $following_id)
    {
        $sql = "insert into following values(:user_id, :following_id)";

        $stmt = $this->execute($sql, array(
            'user_id' => $user_id,
            'following_id' => $following_id,
        ));
    }

    //現在ログインしてるユーザのidとフォローしたいユーザのidを取得
    public function isFollowing($user_id, $following_id)
    {
        $sql = "
             select count(user_id) as count
                from following
                where user_id = :user_id
                    and following_id = :following_id
                ";

        $row = $this->fetch($sql, array(
            ':user_id' => $user_id,
            ':following_id' => $following_id,
        ));

        if($row['count'] !== '0') {
            return true;
        }

        return false;
    }
}