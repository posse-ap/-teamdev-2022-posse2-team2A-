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


//form関連ここから
// 「入力内容を確認する」ボタンを押したらformの入力値を保存するここから
function toCheck(){
  var formElements = document.forms.inputForm; //form.phpのform全体を取得
  var firstName = formElements.first_name.value;
  var lastName = formElements.last_name.value;
  var firstNameKana= formElements.first_name_kana.value;
  var lastNameKana= formElements.last_name_kana.value;
  var birthYear = formElements.birth_year.value;
  var birthMonth = formElements.birth_month.value;
  var birthDay = formElements.birth_day.value;
  var sex = formElements.sex.value;
  var email = formElements.email_check.value;
  var addressPost = formElements.address_postal.value;
  var addressPref = formElements.address_prefecture.value;
  var addressMnic = formElements.address_municipalities.value;
  var addressNumber = formElements.address_number.value;
  var addressBuild = formElements.address_building.value;
  var phoneNumber = formElements.phone_number.value;
  var education = formElements.education.value;
  var major = formElements.major.value;
  var majorDepart = formElements.major_department.value;
  var majorSubject = formElements.major_subject.value;
  var graduationYear = formElements.graduation_year.value;
  var graduationStatus = formElements.graduation_status.value;
  var comments = formElements.comments.value;
}


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