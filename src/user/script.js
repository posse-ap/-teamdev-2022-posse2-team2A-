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

// タブの動きここから
document.addEventListener('DOMContentLoaded', function(){
  // タブに対してクリックイベントを適用
  const tabs = document.getElementsByClassName('tab');
  for(let i = 0; i < tabs.length; i++) {
    tabs[i].addEventListener('click', tabSwitch, false);
  }

  // タブをクリックすると実行する関数
  function tabSwitch(){
    // タブのclassの値を変更
    document.getElementsByClassName('is-active')[0].classList.remove('is-active');
    this.classList.add('is-active');
    // コンテンツのclassの値を変更
    document.getElementsByClassName('is-show')[0].classList.remove('is-show');
    const arrayTabs = Array.prototype.slice.call(tabs);
    const index = arrayTabs.indexOf(this);
    document.getElementsByClassName('panel')[index].classList.add('is-show');
  };
}, false);
// タブの動きここまで

// 画面をスクロールをしたら動かしたい場合の記述
$(window).scroll(function () {
	ScrollAnime();//スクロール途中でヘッダーが消え、上にスクロールすると復活する関数を呼ぶ
});


// 下にスクロール時footerのアイコンが消え、上にスクロールすると現れる動きここまで