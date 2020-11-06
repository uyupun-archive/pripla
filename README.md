# Pripla

<img src="./front/assets/images/logo/logo_black.png" width="200px">

**Princess & Prince date planning service.**

### コマンド

```bash
# 環境構築
$ make setup
# 開発用サーバとコンテナの起動
# フロントエンド: localhost:3000
# バックエンド: localhost:8000
$ make up
# コンテナの終了
$ make down
# Dockerのプロセス確認
$ make ps
# シェルの起動
$ make sh
# DBにテーブル作成 + シーダーの実行
$ make db
# Tinkerの起動
$ make tinker
# Linterによるコード修正
$ make lint
```

### カンプ

- https://www.figma.com/file/4yro9aYdo3e74E17vFvDOI/Pripla?node-id=0%3A1

### APIドキュメント

- [api_document.md](./api_document.md)