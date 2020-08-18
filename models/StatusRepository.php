<?php

class StatusRepository extends DbRepository
{
    //投稿された情報を保存する
    public function insert($user_id, $body)
    {
        //日付を表示
        $now = new DateTime();

        //sqlの情報を取得
        $sql = "
            insert into status(user_id, body, created_at)
            values(:user_id, :body, :created_at)
        ";

        //splを実行する
        $stmt = $this->execute($sql, array(
            ':user_id' => $user_id,
            ':body' => $body,
            ':created_at' => $now->format('Y-m-d H:i:s'),
        ));
    }

    //現在ログインしてるユーザの投稿とフォロー中のユーザの投稿を取得する
    public function fetchAllPersonalArchivesByUserId($user_id)
    {
        $sql = "
            select a.*, u.user_name
                from status a    
                    left join user u ON a.user_id = u.id
                    left join following f ON f.following_id = a.user_id
                        and f.user_id = :user_id
                 where f.user_id = :user_id OR u.id = :user_id
                 order by a.created_at desc 
        ";
        return $this->fetchAll($sql, array(':user_id' => $user_id));
    }

    //ユーザのidに一致する投稿を投稿日の降順に全件取得
    public function fetchAllByUserId($user_id)
    {
        $sql = "
            select a.*, u.user_name
                from status a
                    left join user u ON a.user_id = u.id
                where u.id = :user_id
                order by a.created_at desc
        ";

        return $this->fetchAll($sql, array(':user_id' => $user_id));
    }

    //投稿idとユーザのidに一致するレコードを１件取得する
    public function fetchByIdAndUserName($id, $user_name)
    {
        $sql = "
            select a.*, u.user_name
                from status a
                    left join user u ON u.id = a.user_id
                where a.id = :id
                    and u.user_name = :user_name
        ";

        return $this->fetch($sql, array(
           ':id' => $id,
            ':user_name' => $user_name,
        ));
    }
}
