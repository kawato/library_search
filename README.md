library_search
==============

codeigniter sample

codeigniter 2.1.4を使用した物凄く簡単な書籍検索サンプルになります。
動きを試すために無理やり色々と処理を詰め込んでいます。

以下、サンプルに含まれる技術的内容。
・mysql接続
・development,production,testingの3モードのうち、developmentを選択した場合に画面下部にPOSTパラメータや、発行したSQL
　などのデバッグ情報を表示する
・XSS、CSRF対策
・ページング処理
・codeigniterのURLはhttp://localhost/index.php/indexのように途中.php拡張子が表示されるので、表示されないように
  .htaccessで対応
・URLルーティング
・CSVダウンロード
・validate
・active recodeを使用してのDBアクセス
・フォルダ構成を使いやすい構成に変更
・アプリケーションがテストサーバーに移動になっても動くようにファイルの読み込みなどはすべてbase_urlを通す
・twitter bootstrapを使用
・Super Tablesを使用してtableタグで特定の列を固定して右にスクロールできる
・mysqlにはseaquenceが無い為、sequenceを実現する。参考：(http://qiita.com/jlake/items/b92cf5281216825abe58)

また、気が向いた時にマスタメンテ画面などを作成する。
