// ボタンのクリックによってプログレスバーの色の場所の変動

// スクロール時、一番下に到着するとfooterのアイコンが消える動きここから

var beforePos = 0;//スクロールの値の比較用の設定


//スクロール途中でヘッダーが消え、上にスクロールすると復活する設定を関数にまとめる
function ScrollAnime() {
    var elemTop = $('#footer').offset().top;//#area-2の位置まできたら
	var scroll = $(window).scrollTop();
    //ヘッダーの出し入れをする
    if(scroll == beforePos) {
		//IE11対策で処理を入れない
    }else if(elemTop > scroll || 0 > scroll - beforePos){
		//ヘッダーが上から出現する
		$('#mainFooter').removeClass('UpMove');	//#headerにUpMoveというクラス名を除き
		$('#mainFooter').addClass('DownMove');//#headerにDownMoveのクラス名を追加
    }else {
		//ヘッダーが上に消える
        $('#mainFooter').removeClass('DownMove');//#headerにDownMoveというクラス名を除き
		$('#mainFooter').addClass('UpMove');//#headerにUpMoveのクラス名を追加
    }
    
    beforePos = scroll;//現在のスクロール値を比較用のbeforePosに格納
}


// 画面をスクロールをしたら動かしたい場合の記述
$(window).scroll(function () {
	ScrollAnime();//スクロール途中でヘッダーが消え、上にスクロールすると復活する関数を呼ぶ
});
// スクロール時、一番下に到着するとfooterのアイコンが消える動きここまで