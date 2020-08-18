<?php

class AccountController extends Controller
{
    protected $auth_actions = array('index', 'signout', 'follow');
    //ユーザ登録の画面
    public function signupAction()
    {
        $this->smarty->assign('title', '登録');
        //ユーザがログインしてる場合、そのユーザのホーム画面にリダイレクトする
        if($this->session->isAuthenticated()) {
            return $this->redirect('/account');
        }

        //Viewのレンダリングを行う処理
        //Viewにはuser_nameとpasswordは空の状態で渡してあげる
        return $this->render(array(
            'user_name' => '',
            'password' => '',
            'smarty' => $this->smarty,
           '_token' => $this->generateCsrfToken('account/signup'),
        ));
    }

    //ユーザー登録の処理
    public function registerAction()
    {

        $this->smarty->assign('title', '登録');
        //ユーザがログインしてる場合、そのユーザのホーム画面にリダイレクトする
        if($this->session->isAuthenticated()) {
            return $this->redirect('/account');
        }

        //サーバーがPOSTを受け取らなかった場合404エラーを表示
        if(!$this->request->isPost()) {
            $this->forward404();
        }

        //CSRFトークンのチェック
        $token = $this->request->getPost('_token');
        if(!$this->checkCsrfToken('account/signup', $token)) {
            return $this->redirect('/account/signup');
        }
        $user_name = $this->request->getPost('user_name');
        $password = $this->request->getPost('password');

        //エラー処理
        $errors = array();

        if(!strlen($user_name)) {
            $errors[] = 'ユーザーIDを入力してください';
        }elseif(!preg_match('/^\w{3,20}$/', $user_name)){
            $errors[] =  'ユーザーIDは半角英数字およびアンダースコアを3~20文字以内で入力してください';
        }elseif(!$this->db_manager->get('User')->isUniqueUserName($user_name)) {
            $errors[] = 'ユーザーIDは既に使用されています';
        }
        if(!strlen($password)) {
            $errors[] = 'パスワードを入力してください';
        }elseif(4 > strlen($password) || strlen($password) > 30){
            $errors[] = 'パスワードは4~30文字以内で入力してください';
        }
        if(count($errors) === 0) {
            $this->db_manager->get('User')->insert($user_name,$password);
            $this->session->setAuthenticated(true);
            $user = $this->db_manager->get('User')->fetchByUserName($user_name);
            $this->session->set('user', $user);

            return $this->redirect('/');
        }

        //Viewのレンダリングを行う処理
        //Viewには$user_nameと$passwordと$errorsを渡してあげる
        return $this->render(array(
            'user_name' => $user_name,
            'password' => $password,
            'errors' => $errors,
            'smarty' => $this->smarty,
            '_token' => $this->generateCsrfToken('account/signup'),

        ),'signup');
    }

    //アカウント情報のトップ
    public function indexAction()
    {
        $this->smarty->assign('title', 'アカウント');
        //sessionからユーザ情報を取得して$userに代入
        $user = $this->session->get('user');
        //dbからユーザ情報を取得してそのユーザ情報に一致するレコードを取得して$followingsに代入
        $followings = $this->db_manager->get('User')->fetchAllFollowingsByUserId($user['id']);

        //Viewのレンダリングを行う処理
        //Viewには$userと$followingsを渡してあげる
        return $this->render(array(
             'user' => $user,
             'smarty' => $this->smarty,
             'followings' => $followings,
             ));
    }

    //ログイン画面
    public function signinAction()
    {
        $this->smarty->assign('title', 'ログイン');
        //ユーザがログインしてる場合、そのユーザのホーム画面にリダイレクトする
        if($this->session->isAuthenticated()) {
            return $this->redirect('/account');
        }

        //Viewのレンダリングを行う処理
        //Viewにはuser_nameとpasswordは空の状態で渡してあげる
        return $this->render(array(
            'user_name' => '',
            'password' => '',
            'smarty' => $this->smarty,
            '_token' => $this->generateCsrfToken('account/signin'),
        ));
    }

    //ログイン処理
    public function authenticateAction()
    {

        $this->smarty->assign('title', 'ログイン');
        //ユーザがログインしてる場合、そのユーザのホーム画面にリダイレクトする
        if($this->session->isAuthenticated()) {
            return $this->redirect('/account');
        }

        //サーバーがPOSTを受け取らなかった場合404エラーを表示
        if(!$this->request->isPost()) {
            $this->forward404();
        }

        //CSRFトークンのチェック
        $token = $this->request->getPost('_token');
        if(!$this->checkCsrfToken('account/signin', $token)) {
            return $this->redirect('/account/signin');
        }

        $user_name = $this->request->getPost('user_name');
        $password = $this->request->getPost('password');

        //エラー処理
        $errors = array();

        if(!strlen($user_name)) {
            $errors[] = 'ユーザIDを入力してください';
        }
        if(!strlen($password)) {
            $errors[] = 'パスワードを入力してください';
        }
        if(count($errors) === 0) {
             $user_repository = $this->db_manager->get('User');
             $user = $user_repository->fetchByUserName($user_name);

             if(!$user || ($user['password'] !== $user_repository->hashPassword($password))) {
                 $errors[] = 'ユーザIDかパスワードが不正です';
             }else{
                 $this->session->setAuthenticated(true);
                 $this->session->set('user', $user);

                 return $this->redirect('/');
             }
        }

        //Viewのレンダリングを行う処理
        //Viewには$user_nameと$passwordと$errorsを渡してあげる
        return $this->render(array(
            'user_name' => $user_name,
            'password' => $password,
            'errors' => $errors,
            'smarty' => $this->smarty,
            '_token' => $this->generateCsrfToken('account/signin'),
        ), 'signin');
    }

    //ログアウトの処理
    public function signoutAction()
    {
        $this->session->clear();

        //ログイン制御を解除する
        $this->session->setAuthenticated(false);

        //ログイン画面にリダイレクトする
        return $this->redirect('/account/signin');
    }

    //フォロー処理
    public function followAction()
    {

        $this->smarty->assign('title', 'ログイン');
        //サーバーがPOSTを受け取らなかった場合404エラーを表示
        if(!$this->request->isPost()) {
            $this->forward404();
        }

        //フォローしてる人の名前を$following_nameとして代入
        $following_name = $this->request->getPost('following_name');

        if(!$following_name) {
            $this->forward404();
        }

        //CSRFトークンのチェック
        $token = $this->request->getPost('_token');
        if(!$this->checkCsrfToken('account/follow', $token)) {
            return $this->redirect('/user/' . $following_name);
        }

        //ユーザの存在チェック
        $following_user = $this->db_manager->get('User')->fetchByUserName($following_name);
        if(!$following_user) {
            $this->forward404();
        }

        $user = $this->session->get('user');

        //dbからフォローしてる人を探してきて$following_repositoryに代入
        $following_repository = $this->db_manager->get('Following');

        if($user['id'] !== $following_user['id'] && !$following_repository->isFollowing($user['id'], $following_user['id'])) {

            //$following_repositoryにユーザとフォロしてるユーザのidを保存して渡してあげる
            $following_repository->insert($user['id'], $following_user['id']);
        }

        //ユーザのホーム画面にリダイレクトする
        return $this->redirect('/account');
    }
}