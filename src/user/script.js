// 下にスクロール時footerのアイコンが消え、上にスクロールすると現れる動きここから

var beforePos = 0;//スクロールの値の比較用の設定


//スクロール途中でヘッダーが消え、上にスクロールすると復活する設定を関数にまとめる
function ScrollAnime() {
    var elemTop = $('#footer').offset().top;//#footerの位置まできたら
    var scroll = $(window).scrollTop();
    //ヘッダーの出し入れをする
    if(scroll == beforePos) {
		//IE11対策で処理を入れない
    }else if(elemTop < scroll || 0 < scroll - beforePos){
		//ヘッダーが上から出現する
		$('#mainFooter').removeClass('UpMove');	//#mainFooterにUpMoveというクラス名を除き
		$('#mainFooter').addClass('DownMove');//#mainFooterにDownMoveのクラス名を追加
    }else {
		//ヘッダーが上に消える
        $('#mainFooter').removeClass('DownMove');//#mainFooterにDownMoveというクラス名を除き
        $('#mainFooter').addClass('UpMove');//#mainFooterにUpMoveのクラス名を追加
    }
    
    beforePos = scroll;//現在のスクロール値を比較用のbeforePosに格納
}


// 画面をスクロールをしたら動かしたい場合の記述
$(window).scroll(function () {
	ScrollAnime();//スクロール途中でヘッダーが消え、上にスクロールすると復活する関数を呼ぶ
});


// 下にスクロール時footerのアイコンが消え、上にスクロールすると現れる動きここまで


//form関連ここから
// 「確認する」ボタンを押したらformの入力値を保存するここから


// formの入力値を保存するここまで

// メールアドレスが確認用と違っていたらエラーを吐くここから
function CheckEmail(input){
  var mail = document.getElementById("email").value; //メールフォームの値を取得
  var mailConfirm = input.value; //メール確認用フォームの値を取得(引数input)
  // パスワードの一致確認
  if(mail != mailConfirm){
    input.setCustomValidity('メールアドレスが一致しません'); // エラーメッセージのセット
  }else{
    input.setCustomValidity(''); // エラーメッセージのクリア
  }
  input.reportValidity();
}

// メールアドレスが確認用と違っていたらエラーを吐くここまで


//form関連ここまで