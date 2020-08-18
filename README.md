# How to clone the project
```bash
cd <somewhere to clone repository>
git config --global http.sslVerify false
git clone https://git.doj.local/ekiten/phpstudy.git
cd phpstudy
git config --global http.sslVerify true
git config --local http.sslVerify false
```

# Vagrant
初回  
```bash
cd vagrant
vagrant plugin install vagrant-reload
vagrant plugin install vagrant-hostmanager
vagrant plugin install vagrant-vbguest
vagrant up
vagrant halt
vagrant up
vagrant ssh
```  
2回目以降  
```bash
cd vagrant
vagrant up
vagrant ssh
```  
起動したら  
http://phpstudy/phpinfo.php  
が表示されるか確認する  

# PHPトレーニングをする
[トレーニング計画](TrainingPlan.md)を見てください  
完了したらアカウント申請などの実開発の準備へ進みます

# 開発の準備
ツールのセットアップと共にアカウントの申請が必要です  
参考資料  
https://docs.google.com/spreadsheets/d/1KmEiY0hKP6_q99G05YjFJccYGUBcVwbrE5DlO9QWPVY/edit#gid=330790136  
アカウント申請をしつつツール類をインストールしたらローカル環境をセットアップします

# ローカルエキテンセットアップ
**ローカル開発環境は2018年にVagrant化されました。Wikiを参照してください**

https://knowledge.dojsys.com/mediawiki/index.php/%E3%83%AD%E3%83%BC%E3%82%AB%E3%83%AB%E7%92%B0%E5%A2%83%E3%82%BB%E3%83%83%E3%83%88%E3%82%A2%E3%83%83%E3%83%97_(ekiten-dev)

1. ~~ツール類を正しくインストールする~~
1. ~~Gitでエキテンのmasterをcloneする~~
1. ~~config フォルダの xx.sampleをコピペして.sampleを無くしたファイル名のものを作成する (中身はそのままでOK)~~
1. ~~secure_html/stf/.htaccess と secure_html/support/.htaccess の Allow from に 192.168.56.1 を追加する~~
1. ~~Virtual Machine ManagerにエキテンのOVAをインポートする~~
1. ~~hostsファイルに ekiten.piyo のIPを追加する~~
1. ~~ekiten.piyoのVMを起動する~~
1. http://ekiten.piyo/ に接続できることを確認する
1. http://ekiten.piyo:8282/ に接続できることを確認する
1. http://ekiten.piyo:8585/ に接続できることを確認する
1. ~~http://ekiten.piyo:8686/ に接続できることを確認する~~
1. https://ekiten.piyo/stf/ に接続できることを確認する
1. https://ekiten.piyo/own/ に接続できることを確認する
1. https://ekiten.piyo/support/ に接続できることを確認する
1. http://ekiten.piyo:1080/ に接続できることを確認する (接続できない時は /etc/init.d/mailcatcher の --http-ip を確認する)
1. [エキテンを使ってみる](https://docs.google.com/document/d/17VDop20KvxFDvnaAM-9BekXHyhop7MI0j16N4Tvx8xI/edit)へ進む
