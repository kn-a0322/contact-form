# ContactForm App

## 概要
Laravelで作成した、**バリデーション**・**確認画面**付きのお問い合わせフォームです。

## 主な機能
- 入力フォーム（`old()` による入力値保持）
- バリデーション（FormRequest）
- 確認画面（confirm）
- 送信（DB保存）/ 確認画面から「入力内容を修正する」で入力画面へ戻る

## 使用技術
- PHP / Laravel
- MySQL
- Nginx
- Docker / docker-compose

## 環境構築手順（Docker）
前提: Docker / docker-compose が利用できること

### 1) コンテナ起動
```bash
docker compose up -d --build
```

### 2) 依存関係のインストール（composer）
```bash
docker compose exec php bash -lc "cd /var/www && composer install"
```

### 3) `.env` の作成
```bash
docker compose exec php bash -lc "cd /var/www && cp .env.example .env"
```

必要に応じて `.env` のDB設定を環境に合わせて調整してください。

### 4) APP_KEY の生成
```bash
docker compose exec php bash -lc "cd /var/www && php artisan key:generate"
```

### 5) マイグレーション
```bash
docker compose exec php bash -lc "cd /var/www && php artisan migrate"
```

## 主要ディレクトリ
- `src/`: Laravelアプリ本体
- `docker/`: Docker設定（nginx / php / mysql）
