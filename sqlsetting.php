<?php
    /*
    ******************************************************************************
    SQL関係のメソッド
    2021/01/25
    ******************************************************************************
    */

    include __DIR__ . '/method.php';

    function userSarch($email, $pass){
        include __DIR__ .'/var.php';

        try {
            //DB内でPOSTされたメールアドレスを検索
            $db = new PDO($dsn, $user, $password);
            $sql = 'select * from users where email = ?';
            $stmt = $db->prepare($sql);
            $stmt->execute($email);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $error) {
            echo "error" . $error->getMessage();
        }

        if (!isset($row['email'])) {
            //emailがDB内に存在しているか確認
            echo 'メールアドレス又はパスワードが間違っています。';
            return false;
        }

        //パスワード確認後sessionにメールアドレスを渡す
        if (password_verify($pass, $row['password'])) {
            session_regenerate_id(true); //session_idを新しく生成し、置き換える
            $_SESSION['EMAIL'] = $row['email'];
            echo 'ログインしました';
        } else {
        echo 'メールアドレス又はパスワードが間違っています。';
        return false;
        }


    }
?>