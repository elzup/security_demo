# ベースイメージとして公式のNode.jsイメージを使用
FROM node:14

# アプリケーションの作業ディレクトリを作成
WORKDIR /app

# package.jsonとpackage-lock.jsonをコピー
COPY src/package*.json ./

# 依存関係をインストール
RUN npm install

# アプリケーションコードをコピー
COPY src .

# アプリケーションを公開するポートを指定
EXPOSE 3000

# アプリケーションを実行
CMD ["node", "index.js"]
