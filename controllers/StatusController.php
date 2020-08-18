<?php
class StatusController extends Controller
{

    protected $auth_actions = array('index', 'post');

    //ログインしてるユーザのホームページ
    public function indexAction()
    {

        $this->smarty->assign('title', 'ホーム');
        //ユーザ情報を取得して$userに代入
        $user = $this->session->get('user');
        //dbから投稿内容を取得して$statusesに代入
        $statuses = $this->db_manager->get('Status')->fetchAllPersonalArchivesByUserId($user['id']);
        $uploaders = $this->db_manager->get('Uploaders');

        //Viewのレンダリングを行う処理
        //Viewには$statusesと空のbodyを渡してあげる
        return $this->render(array(
            'statuses' => $statuses,
            'body' => '',
            'uploaders' => $uploaders,
            'smarty' => $this->smarty,
            '_token' => $this->generateCsrfToken('status/post'),
        ));
    }

    //投稿処理
    public function postAction()
    {
        $this->smarty->assign('title', 'ホーム');
        //サーバーがPOSTを受け取らなかった場合404エラーを表示
        if(!$this->request->isPost()) {
            $this->forward404();
        }

        //CSRFトークンのチェック
        $token = $this->request->getPost('_token');
        if(!$this->checkCsrfToken('status/post', $token)) {
            return $this->redirect('/');
        }

        $body = $this->request->getPost('body');

        //以下にエラー処理記述
        $errors = array();

        //投稿内容が空だった場合
        if(!strlen($body)) {

            $errors[] = 'ひとことを入力してください';
        }elseif(mb_strlen($body) > 200) {
            $errors[] = 'ひとことは200文字以内で入力してください';
        }
        //upimgという名前のファイルがPOSTによりアップロードされたファイルじゃなかった場合
        if(!is_uploaded_file($_FILES["upimg"]["tmp_name"])) {
            //$errorsの配列に'画像を選択してください'と渡してあげる
            $errors[] = '画像を選択してください';
        }
        //エラーがない場合
        if(count($errors) === 0) {
            //imagesというディレクトリをapplicationの配下に作成
            $uploads_dir = '/var/www/application/images/';
            //$tmp_nameに一時保存ファイルを渡す
            $tmp_name = $_FILES["upimg"]["tmp_name"];
            //$nameにファイル名を渡す
            $name = basename($_FILES["upimg"]["name"]);
            //アップロードされたファイルを新しい場所に移動する
            move_uploaded_file($tmp_name, $uploads_dir.$name);
            //所有者に、読み込み・書き込みの権限を与え、グループやその他に、読み込み・書き込み・実行の権限を与えてあげる
            chmod($uploads_dir.$name, 0677);

            $user = $this->session->get('user');
            //ユーザ情報が保存される
            $this->db_manager->get('Status')->insert($user['id'], $body);
            $this->db_manager->get('Uploaders')->insert($user['user_name']);
            //画像がアップロードされたらリダイレクトする
            return $this->redirect('/');
        }

        $user = $this->session->get('user');
        $statuses = $this->db_manager->get('Status')->fetchAllPersonalArchivesByUserId($user['id']);
        $uploaders = $this->db_manager->get('Uploaders');

        //Viewのレンダリングを行う処理
        //Viewには$errorsと$bodyと$statusesを渡してあげる
        return $this->render(array(
            'errors' => $errors,
            'body' => $body,
            'statuses' => $statuses,
            'uploaders' => $uploaders,
            'smarty' => $this->smarty,
            '_token' => $this->generateCsrfToken('status/post'),
        ), 'index');
    }

    //ユーザの投稿一覧
    public function userAction($params)
    {
        $this->smarty->assign('title', 'MiniBlog');
        //dbからユーザー情報を取得してユーザが存在するかチェックする
        $user = $this->db_manager->get('User')->fetchByUserName($params['user_name']);

        //存在しないユーザが選択された場合は404エラーを表示する
        if(!$user) {
            $this->forward404();
        }

        //ユーザの投稿一覧を表示する
        $statuses = $this->db_manager->get('Status')->fetchAllByUserId($user['id']);

        $following = null;

        //ログインしてる場合
        if($this->session->isAuthenticated()) {
            $my = $this->session->get('user');
            //アクセスしてるユーザの投稿一覧が自分のものではない場合
            if($my['id'] !== $user['id']) {
                //フォローしようと表示される
                $following = $this->db_manager->get('Following')->isFollowing($my['id'], $user['id']);
            }
        }

        //Viewのレンダリングを行う処理
        //Viewには$userと$statusesと$followingを渡してあげる
        return $this->render(array(
            'user' => $user,
            'statuses' => $statuses,
            'following' => $following,
            'smarty' => $this->smarty,
            '_token' => $this->generateCsrfToken('account/follow'),
        ));
    }

    //投稿詳細
    public function showAction($params)
    {
        //dbから投稿内容を取得する
        $status = $this->db_manager->get('Status')->fetchByIdAndUserName($params['id'],($params['user_name']));

        //投稿内容が取得できなかったら404エラー表示
        if(!$status) {
            $this->forward404();
        }
        //Viewに$statusを渡してあげる
        return $this->render(array('status' => $status));
    }

}










