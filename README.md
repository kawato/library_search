library_search
==============

codeigniter sample

codeigniter 2.1.4を使用した物凄く簡単な書籍検索サンプルになります。<br/>
画面は、ログイン画面と検索画面のみ。<br/>
検索画面は丈夫に条件を入力して、検索ボタンを押下後、下部に一覧が表示されます。<br/>
その後、CSVボタンを押下することで、一覧結果をCSVにダウンロードすることが出来ます。

動きを試すために無理やり色々と処理を詰め込んでいます。<br/>

以下、サンプルに含まれる技術的内容。<br/>
・mysql接続<br/>
・development,production,testingの3モードのうち、developmentを選択した場合に画面下部にPOSTパラメータや、発行したSQL<br/>
　などのデバッグ情報を表示する<br/>
・XSS、CSRF対策<br/>
・ページング処理<br/>
・codeigniterのURLはhttp://localhost/index.php/indexのように途中.php拡張子が表示されるので、表示されないように<br/>
  .htaccessで対応<br/>
・URLルーティング<br/>
・CSVダウンロード<br/>
・validate<br/>
・active recodeを使用してのDBアクセス<br/>
・フォルダ構成を使いやすい構成に変更<br/>
・アプリケーションがテストサーバーに移動になっても動くようにファイルの読み込みなどはすべてbase_urlを通す<br/>
・twitter bootstrapを使用<br/>
・Super Tablesを使用してtableタグで特定の列を固定して右にスクロールできる<br/>
・mysqlにはseaquenceが無い為、sequenceを実現する。参考：(http://qiita.com/jlake/items/b92cf5281216825abe58)<br/>

また、気が向いた時にマスタメンテ画面などを作成する。
