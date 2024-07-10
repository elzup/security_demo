# ベースイメージを指定
FROM ubuntu:latest

# 必要なパッケージをインストール
RUN apt-get update && apt-get install -y openssh-server

# SSHサーバー用のディレクトリを作成
RUN mkdir /var/run/sshd

# rootユーザーのパスワードを設定（ここではrootpasswordを使用）
RUN echo 'root:rootpassword' | chpasswd

# パスワード認証を有効化
RUN sed -i 's/#PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config

# SSHサービスを起動
CMD ["/usr/sbin/sshd", "-D"]

# コンテナが外部からアクセスできるようにポート22を開放
EXPOSE 22
