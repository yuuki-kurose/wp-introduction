<?php get_header(); ?>
<div class="register">
  <form class="register__form">
    <div class="register__container">
      <label for="username">ユーザー名</label>
      <input type="text" id="userName" placeholder="ユーザー名を英数字8文字以内で入力してください" required />
    </div>
    <div class="register__container">
      <label for="password">パスワード</label>
      <input type="password" id="passWord" placeholder="パスワードを英数字記号ありで8文字以内で入力してください" required />
    </div>
    <div class="register__button">
      <button type="submit" id="register-button">登録する</button>
    </div>
  </form>
</div>

<script>
  document.getElementById('register-button').addEventListener('submit', (e) => {
    e.preventDefault();
    const userName = document.getElementById('userName').value; // ユーザー名を取得
    const passWord = document.getElementById('passWord').value; // パスワードを取得

    const userRegex = /^[a-z0-9_]{1,8}$/; // ユーザー名の正規表現
    const passRegex = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[\W_]).{8,}$/; // パスワードの正規表現

    // 未入力チェック
    if(userName === '' && passWord === '') {
      alert('ユーザー名とパスワードを入力してください');
      return;
    } else if(userName === '') {
      alert('ユーザー名を入力してください');
      return;
    } else if(passWord === '') {
      alert('パスワードを入力してください');
      return;
    };

    // 正しい形式がチェック
    if(!userRegex.test(userName)) {
      alert('ユーザー名が違います');
      return;
    } else if(!passRegex.test(passWord)) {
      alert('パスワードが違います');
      return;
    }

    // 登録情報を送信
    fetch('<?php echo admin_url("admin-ajax.php") ?>', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: new URLSearchParams({
        action: 'register_user',
        username: userName,
        password: passWord
      })
    })
  })
</script>